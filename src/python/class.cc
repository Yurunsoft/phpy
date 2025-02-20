/*
  +----------------------------------------------------------------------+
  | Phpy                                                                 |
  +----------------------------------------------------------------------+
  | This source file is subject to version 2.0 of the Apache license,    |
  | that is bundled with this package in the file LICENSE, and is        |
  | available through the world-wide-web at the following url:           |
  | http://www.apache.org/licenses/LICENSE-2.0.html                      |
  | If you did not receive a copy of the Apache2.0 license and are unable|
  | to obtain it through the world-wide-web, please send a note to       |
  | license@swoole.com so we can mail you a copy immediately.            |
  +----------------------------------------------------------------------+
  | Author: Tianfeng Han  <rango@swoole.com>                             |
  | Copyright: 上海识沃网络科技有限公司                                       |
  +----------------------------------------------------------------------+
 */

#include "phpy.h"

struct ZendClass;

static int Class_init(ZendClass *self, PyObject *args, PyObject *kwds);
static PyObject *Class_new(ZendClass *self, PyObject *args);
static PyObject *Class_get(ZendClass *self, PyObject *args);
static PyObject *Class_set(ZendClass *self, PyObject *args);

// clang-format off
struct ZendClass {
    PyObject_HEAD
    zend_class_entry *ce;
};

static PyMethodDef Class_methods[] = {
    {"new", (PyCFunction) Class_new, METH_VARARGS, "Create an instance" },
    {"get", (PyCFunction) Class_get, METH_VARARGS, "Get class static property" },
    {"set", (PyCFunction) Class_set, METH_VARARGS, "Set class static property" },
    {NULL}  /* Sentinel */
};

static PyTypeObject ZendClassType = {
    .ob_base = PyVarObject_HEAD_INIT(NULL, 0)
    .tp_name = "zend.Class",
    .tp_basicsize = sizeof(ZendClass),
    .tp_itemsize = 0,
    .tp_flags = Py_TPFLAGS_DEFAULT,
    .tp_doc = PyDoc_STR("zend_class"),
    .tp_methods = Class_methods,
    .tp_init = (initproc) Class_init,
    .tp_new = PyType_GenericNew,
};
// clang-format on

bool py_module_class_init(PyObject *m) {
    if (PyType_Ready(&ZendClassType) < 0) {
        return false;
    }
    Py_INCREF(&ZendClassType);
    if (PyModule_AddObject(m, "Class", (PyObject *) &ZendClassType) < 0) {
        Py_DECREF(&ZendClassType);
        Py_DECREF(m);
        return false;
    }
    return true;
}

static int Class_init(ZendClass *self, PyObject *args, PyObject *kwds) {
    const char *name = 0;
    size_t l_name;
    if (!PyArg_ParseTuple(args, "s#", &name, &l_name)) {
        PyErr_SetString(PyExc_TypeError, "must supply at least 1 parameter.");
        return -1;
    }

    zend_string *_class_name = zend_string_init(name, l_name, 0);
    zend_class_entry *ce = zend_lookup_class(_class_name);
    zend_string_release(_class_name);
    if (ce == NULL) {
        PyErr_Format(PyExc_TypeError, "Class \"%s\" not found", ZSTR_VAL(_class_name));
        return -1;
    }
    self->ce = ce;
    return 0;
}

static PyObject *Class_new(ZendClass *self, PyObject *args) {
    return object_create(self->ce, args, PyTuple_Size(args), 0);
}

static PyObject *Class_get(ZendClass *self, PyObject *args) {
    char *name;
    size_t l_name;
    if (!PyArg_ParseTuple(args, "s#", &name, &l_name)) {
        return NULL;
    }

    zval *retval;
    zend_first_try {
        retval = zend_read_static_property(self->ce, name, l_name, 0);
    }
    zend_catch {
        Py_INCREF(Py_None);
        return Py_None;
    }
    zend_end_try();

    RETURN_PYOBJ(retval);
}

static PyObject *Class_set(ZendClass *self, PyObject *args) {
    char *name;
    size_t l_name;
    PyObject *value;
    if (!PyArg_ParseTuple(args, "s#O", &name, &l_name, &value)) {
        return NULL;
    }

    zval rv;
    py2php(value, &rv);

    if (zend_update_static_property(self->ce, name, l_name, &rv) == SUCCESS) {
        Py_INCREF(Py_True);
        return Py_True;
    } else {
        Py_INCREF(Py_False);
        return Py_False;
    }
}
