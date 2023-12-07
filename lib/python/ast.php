<?php
namespace python;

use \PyModule;
use \PyCore;

/**

    ast
    ~~~

    The `ast` module helps Python applications to process trees of the Python
    abstract syntax grammar.  The abstract syntax itself might change with
    each Python release; this module helps to find out programmatically what
    the current grammar looks like and allows modifications of it.

    An abstract syntax tree can be generated by passing `ast.PyCF_ONLY_AST` as
    a flag to the `compile()` builtin function or by using the `parse()`
    function from this module.  The result will be a tree of objects whose
    classes all inherit from `ast.AST`.

    A modified abstract syntax tree can be compiled into a Python code object
    using the built-in `compile()` function.

    Additionally various helper functions are provided that make working with
    the trees simpler.  The main intention of the helper functions and this
    module in general is to provide an easy to use interface for libraries
    that work tightly with the python syntax (template engines for example).


    :copyright: Copyright 2008 by Armin Ronacher.
    :license: Python License.
*/
class ast{
    private static ?PyModule $__module = null;

    public static function __init(): void {
        if (self::$__module == null) {
            self::$__module = PyCore::import('ast');
            self::$AST = self::$__module->AST;
            self::$Add = self::$__module->Add;
            self::$And = self::$__module->And;
            self::$AnnAssign = self::$__module->AnnAssign;
            self::$Assert = self::$__module->Assert;
            self::$Assign = self::$__module->Assign;
            self::$AsyncFor = self::$__module->AsyncFor;
            self::$AsyncFunctionDef = self::$__module->AsyncFunctionDef;
            self::$AsyncWith = self::$__module->AsyncWith;
            self::$Attribute = self::$__module->Attribute;
            self::$AugAssign = self::$__module->AugAssign;
            self::$AugLoad = self::$__module->AugLoad;
            self::$AugStore = self::$__module->AugStore;
            self::$Await = self::$__module->Await;
            self::$BinOp = self::$__module->BinOp;
            self::$BitAnd = self::$__module->BitAnd;
            self::$BitOr = self::$__module->BitOr;
            self::$BitXor = self::$__module->BitXor;
            self::$BoolOp = self::$__module->BoolOp;
            self::$Break = self::$__module->Break;
            self::$Bytes = self::$__module->Bytes;
            self::$Call = self::$__module->Call;
            self::$ClassDef = self::$__module->ClassDef;
            self::$Compare = self::$__module->Compare;
            self::$Constant = self::$__module->Constant;
            self::$Continue = self::$__module->Continue;
            self::$Del = self::$__module->Del;
            self::$Delete = self::$__module->Delete;
            self::$Dict = self::$__module->Dict;
            self::$DictComp = self::$__module->DictComp;
            self::$Div = self::$__module->Div;
            self::$Ellipsis = self::$__module->Ellipsis;
            self::$Eq = self::$__module->Eq;
            self::$ExceptHandler = self::$__module->ExceptHandler;
            self::$Expr = self::$__module->Expr;
            self::$Expression = self::$__module->Expression;
            self::$ExtSlice = self::$__module->ExtSlice;
            self::$FloorDiv = self::$__module->FloorDiv;
            self::$For = self::$__module->For;
            self::$FormattedValue = self::$__module->FormattedValue;
            self::$FunctionDef = self::$__module->FunctionDef;
            self::$FunctionType = self::$__module->FunctionType;
            self::$GeneratorExp = self::$__module->GeneratorExp;
            self::$Global = self::$__module->Global;
            self::$Gt = self::$__module->Gt;
            self::$GtE = self::$__module->GtE;
            self::$If = self::$__module->If;
            self::$IfExp = self::$__module->IfExp;
            self::$Import = self::$__module->Import;
            self::$ImportFrom = self::$__module->ImportFrom;
            self::$In = self::$__module->In;
            self::$Index = self::$__module->Index;
            self::$IntEnum = self::$__module->IntEnum;
            self::$Interactive = self::$__module->Interactive;
            self::$Invert = self::$__module->Invert;
            self::$Is = self::$__module->Is;
            self::$IsNot = self::$__module->IsNot;
            self::$JoinedStr = self::$__module->JoinedStr;
            self::$LShift = self::$__module->LShift;
            self::$Lambda = self::$__module->Lambda;
            self::$List = self::$__module->List;
            self::$ListComp = self::$__module->ListComp;
            self::$Load = self::$__module->Load;
            self::$Lt = self::$__module->Lt;
            self::$LtE = self::$__module->LtE;
            self::$MatMult = self::$__module->MatMult;
            self::$Match = self::$__module->Match;
            self::$MatchAs = self::$__module->MatchAs;
            self::$MatchClass = self::$__module->MatchClass;
            self::$MatchMapping = self::$__module->MatchMapping;
            self::$MatchOr = self::$__module->MatchOr;
            self::$MatchSequence = self::$__module->MatchSequence;
            self::$MatchSingleton = self::$__module->MatchSingleton;
            self::$MatchStar = self::$__module->MatchStar;
            self::$MatchValue = self::$__module->MatchValue;
            self::$Mod = self::$__module->Mod;
            self::$Module = self::$__module->Module;
            self::$Mult = self::$__module->Mult;
            self::$Name = self::$__module->Name;
            self::$NameConstant = self::$__module->NameConstant;
            self::$NamedExpr = self::$__module->NamedExpr;
            self::$NodeTransformer = self::$__module->NodeTransformer;
            self::$NodeVisitor = self::$__module->NodeVisitor;
            self::$Nonlocal = self::$__module->Nonlocal;
            self::$Not = self::$__module->Not;
            self::$NotEq = self::$__module->NotEq;
            self::$NotIn = self::$__module->NotIn;
            self::$Num = self::$__module->Num;
            self::$Or = self::$__module->Or;
            self::$Param = self::$__module->Param;
            self::$Pass = self::$__module->Pass;
            self::$Pow = self::$__module->Pow;
            self::$RShift = self::$__module->RShift;
            self::$Raise = self::$__module->Raise;
            self::$Return = self::$__module->Return;
            self::$Set = self::$__module->Set;
            self::$SetComp = self::$__module->SetComp;
            self::$Slice = self::$__module->Slice;
            self::$Starred = self::$__module->Starred;
            self::$Store = self::$__module->Store;
            self::$Str = self::$__module->Str;
            self::$Sub = self::$__module->Sub;
            self::$Subscript = self::$__module->Subscript;
            self::$Suite = self::$__module->Suite;
            self::$Try = self::$__module->Try;
            self::$TryStar = self::$__module->TryStar;
            self::$Tuple = self::$__module->Tuple;
            self::$TypeIgnore = self::$__module->TypeIgnore;
            self::$UAdd = self::$__module->UAdd;
            self::$USub = self::$__module->USub;
            self::$UnaryOp = self::$__module->UnaryOp;
            self::$While = self::$__module->While;
            self::$With = self::$__module->With;
            self::$Yield = self::$__module->Yield;
            self::$YieldFrom = self::$__module->YieldFrom;
            self::$_ABC = self::$__module->_ABC;
            self::$_ALL_QUOTES = self::$__module->_ALL_QUOTES;
            self::$_MULTI_QUOTES = self::$__module->_MULTI_QUOTES;
            self::$_Precedence = self::$__module->_Precedence;
            self::$_SINGLE_QUOTES = self::$__module->_SINGLE_QUOTES;
            self::$_Unparser = self::$__module->_Unparser;
            self::$_const_node_type_names = self::$__module->_const_node_type_names;
            self::$_const_types = self::$__module->_const_types;
            self::$_const_types_not = self::$__module->_const_types_not;
            self::$alias = self::$__module->alias;
            self::$arg = self::$__module->arg;
            self::$arguments = self::$__module->arguments;
            self::$auto = self::$__module->auto;
            self::$boolop = self::$__module->boolop;
            self::$cmpop = self::$__module->cmpop;
            self::$comprehension = self::$__module->comprehension;
            self::$excepthandler = self::$__module->excepthandler;
            self::$expr = self::$__module->expr;
            self::$expr_context = self::$__module->expr_context;
            self::$keyword = self::$__module->keyword;
            self::$match_case = self::$__module->match_case;
            self::$mod = self::$__module->mod;
            self::$nullcontext = self::$__module->nullcontext;
            self::$operator = self::$__module->operator;
            self::$pattern = self::$__module->pattern;
            self::$slice = self::$__module->slice;
            self::$stmt = self::$__module->stmt;
            self::$sys = self::$__module->sys;
            self::$type_ignore = self::$__module->type_ignore;
            self::$unaryop = self::$__module->unaryop;
            self::$withitem = self::$__module->withitem;
        }
    }

    public const PyCF_ALLOW_TOP_LEVEL_AWAIT = 8192;
    public const PyCF_ONLY_AST = 1024;
    public const PyCF_TYPE_COMMENTS = 4096;

    public static $_INFSTR = "1e309";
    public static $__name__ = "ast";
    public static $__package__ = "";

    public static $AST = null;
    public static $Add = null;
    public static $And = null;
    public static $AnnAssign = null;
    public static $Assert = null;
    public static $Assign = null;
    public static $AsyncFor = null;
    public static $AsyncFunctionDef = null;
    public static $AsyncWith = null;
    public static $Attribute = null;
    public static $AugAssign = null;
    public static $AugLoad = null;
    public static $AugStore = null;
    public static $Await = null;
    public static $BinOp = null;
    public static $BitAnd = null;
    public static $BitOr = null;
    public static $BitXor = null;
    public static $BoolOp = null;
    public static $Break = null;
    public static $Bytes = null;
    public static $Call = null;
    public static $ClassDef = null;
    public static $Compare = null;
    public static $Constant = null;
    public static $Continue = null;
    public static $Del = null;
    public static $Delete = null;
    public static $Dict = null;
    public static $DictComp = null;
    public static $Div = null;
    public static $Ellipsis = null;
    public static $Eq = null;
    public static $ExceptHandler = null;
    public static $Expr = null;
    public static $Expression = null;
    public static $ExtSlice = null;
    public static $FloorDiv = null;
    public static $For = null;
    public static $FormattedValue = null;
    public static $FunctionDef = null;
    public static $FunctionType = null;
    public static $GeneratorExp = null;
    public static $Global = null;
    public static $Gt = null;
    public static $GtE = null;
    public static $If = null;
    public static $IfExp = null;
    public static $Import = null;
    public static $ImportFrom = null;
    public static $In = null;
    public static $Index = null;
    public static $IntEnum = null;
    public static $Interactive = null;
    public static $Invert = null;
    public static $Is = null;
    public static $IsNot = null;
    public static $JoinedStr = null;
    public static $LShift = null;
    public static $Lambda = null;
    public static $List = null;
    public static $ListComp = null;
    public static $Load = null;
    public static $Lt = null;
    public static $LtE = null;
    public static $MatMult = null;
    public static $Match = null;
    public static $MatchAs = null;
    public static $MatchClass = null;
    public static $MatchMapping = null;
    public static $MatchOr = null;
    public static $MatchSequence = null;
    public static $MatchSingleton = null;
    public static $MatchStar = null;
    public static $MatchValue = null;
    public static $Mod = null;
    public static $Module = null;
    public static $Mult = null;
    public static $Name = null;
    public static $NameConstant = null;
    public static $NamedExpr = null;
    public static $NodeTransformer = null;
    public static $NodeVisitor = null;
    public static $Nonlocal = null;
    public static $Not = null;
    public static $NotEq = null;
    public static $NotIn = null;
    public static $Num = null;
    public static $Or = null;
    public static $Param = null;
    public static $Pass = null;
    public static $Pow = null;
    public static $RShift = null;
    public static $Raise = null;
    public static $Return = null;
    public static $Set = null;
    public static $SetComp = null;
    public static $Slice = null;
    public static $Starred = null;
    public static $Store = null;
    public static $Str = null;
    public static $Sub = null;
    public static $Subscript = null;
    public static $Suite = null;
    public static $Try = null;
    public static $TryStar = null;
    public static $Tuple = null;
    public static $TypeIgnore = null;
    public static $UAdd = null;
    public static $USub = null;
    public static $UnaryOp = null;
    public static $While = null;
    public static $With = null;
    public static $Yield = null;
    public static $YieldFrom = null;
    public static $_ABC = null;
    public static $_ALL_QUOTES = null;
    public static $_MULTI_QUOTES = null;
    public static $_Precedence = null;
    public static $_SINGLE_QUOTES = null;
    public static $_Unparser = null;
    public static $_const_node_type_names = null;
    public static $_const_types = null;
    public static $_const_types_not = null;
    public static $alias = null;
    public static $arg = null;
    public static $arguments = null;
    public static $auto = null;
    public static $boolop = null;
    public static $cmpop = null;
    public static $comprehension = null;
    public static $excepthandler = null;
    public static $expr = null;
    public static $expr_context = null;
    public static $keyword = null;
    public static $match_case = null;
    public static $mod = null;
    public static $nullcontext = null;
    public static $operator = null;
    public static $pattern = null;
    public static $slice = null;
    public static $stmt = null;
    public static $sys = null;
    public static $type_ignore = null;
    public static $unaryop = null;
    public static $withitem = null;

    public static function _dims_getter($self)
    {
        return self::$__module->_dims_getter($self);
    }
    public static function _dims_setter($self, $value)
    {
        return self::$__module->_dims_setter($self, $value);
    }
    public static function _getter($self)
    {
        return self::$__module->_getter($self);
    }
    public static function _new($cls)
    {
        return self::$__module->_new($cls);
    }
    public static function _pad_whitespace($source)
    {
        return self::$__module->_pad_whitespace($source);
    }
    public static function _setter($self, $value)
    {
        return self::$__module->_setter($self, $value);
    }
    public static function _simple_enum($etype=array (
))
    {
        return self::$__module->_simple_enum($etype);
    }
    public static function _splitlines_no_ff($source)
    {
        return self::$__module->_splitlines_no_ff($source);
    }
    public static function contextmanager($func)
    {
        return self::$__module->contextmanager($func);
    }
    public static function copy_location($new_node, $old_node)
    {
        return self::$__module->copy_location($new_node, $old_node);
    }
    public static function dump($node, $annotate_fields=true, $include_attributes=false)
    {
        return self::$__module->dump($node, $annotate_fields, $include_attributes);
    }
    public static function fix_missing_locations($node)
    {
        return self::$__module->fix_missing_locations($node);
    }
    public static function get_docstring($node, $clean=true)
    {
        return self::$__module->get_docstring($node, $clean);
    }
    public static function get_source_segment($source, $node)
    {
        return self::$__module->get_source_segment($source, $node);
    }
    public static function increment_lineno($node, $n=1)
    {
        return self::$__module->increment_lineno($node, $n);
    }
    public static function iter_child_nodes($node)
    {
        return self::$__module->iter_child_nodes($node);
    }
    public static function iter_fields($node)
    {
        return self::$__module->iter_fields($node);
    }
    public static function literal_eval($node_or_string)
    {
        return self::$__module->literal_eval($node_or_string);
    }
    public static function main()
    {
        return self::$__module->main();
    }
    public static function parse($source, $filename="<unknown>", $mode="exec")
    {
        return self::$__module->parse($source, $filename, $mode);
    }
    public static function unparse($ast_obj)
    {
        return self::$__module->unparse($ast_obj);
    }
    public static function walk($node)
    {
        return self::$__module->walk($node);
    }
}

ast::__init();
