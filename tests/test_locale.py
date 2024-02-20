import os

import pytest
import phpy
import locale;
import sys;

def test_new_object():
    rs = phpy.include("./tests/lib/locale.php")
    assert type(rs) is list

    assert locale.getdefaultlocale() == rs[0]
    assert locale.getpreferredencoding() == rs[1]
    assert sys.getdefaultencoding() == rs[2]
    assert sys.getfilesystemencoding() == rs[3]
