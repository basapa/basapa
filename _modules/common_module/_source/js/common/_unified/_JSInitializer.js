/*
IMPORT_PRIORITY:100
*/

'use strict';

window.bsp = {};

bsp.i_getNamespace = function(aNamespace_str)
{
	var lNamespaceParts_str_arr = aNamespace_str.split('.');
	var lParentNamespace_obj = window;
	
	var lNamespacePartsCount_int = lNamespaceParts_str_arr.length;
	for (var i = 0; i < lNamespacePartsCount_int; i++)
	{
		var lSubNamespaceName_str = lNamespaceParts_str_arr[i];
		
		var lSubNamespace_obj = lParentNamespace_obj[lSubNamespaceName_str];
		if (!lSubNamespace_obj)
		{
			lSubNamespace_obj = {};
			lParentNamespace_obj[lSubNamespaceName_str] = lSubNamespace_obj;
		}

		lParentNamespace_obj = lSubNamespace_obj;
	}

	return lParentNamespace_obj;
};


bsp.i_setExtends = function(aChild_clss, aParent_clss)
{
	var F = function(){};
	F.prototype = aParent_clss.prototype;
	aChild_clss.prototype = new F();
	aChild_clss.prototype.constructor = aChild_clss;
	aChild_clss.superclass = aParent_clss.prototype;
};

/*bsp.i_getArray = function(aArray_str)
{
	return aArray_str ? aArray_str.split(',') : null;
};

bsp.i_getObject = function(aObject_str)
{
	if (aObject_str instanceof Object)
	{
		return aObject_str;
	}

	var lObject_obj = {};
	if (aObject_str)
	{
		var lArray_str_arr = aObject_str.split(';');
		var lLength_int = lArray_str_arr.length;
		for (var i = 0; i < lLength_int; i++)
		{
			var lElements_str_arr = lArray_str_arr[i].split(':');
			lObject_obj[lElements_str_arr[0]] = lElements_str_arr[1];
		}
	}
	return lObject_obj;
};*/
/*
function bsp.i_getMultiArray(aArray_str)
{
	var lMultiArray_arr_arr = [];
	if (aArray_str)
	{
		var lArray_str_arr = aArray_str.split('|');
		var lLength_int = lArray_str_arr.length;
		for (var i = 0; i < lLength_int; i++)
		{
			lMultiArray_arr_arr[i] = i_getArray(lArray_str_arr[i]);
		}
	}
	return lMultiArray_arr_arr;
}

function bsp.i_getMultiObject(aObject_str)
{
	if (aObject_str instanceof Object)
	{
		return aObject_str;
	}
	
	var lMultiObject_obj_arr = [];
	if (aObject_str)
	{
		var lArray_str_arr = aObject_str.split('|');
		var lLength_int = lArray_str_arr.length;
		for (var i = 0; i < lLength_int; i++)
		{
			lMultiObject_obj_arr[i] = i_getObject(lArray_str_arr[i]);
		}
	}
	return lMultiObject_obj_arr;
}*/

/*bsp.i_eval = function(aCode_str)//----
{
	var lDocument_obj = document;
	var lScript_obj = lDocument_obj.createElement('script');
	lScript_obj.text = aCode_str;
	lDocument_obj.body.appendChild(lScript_obj).parentNode.removeChild(lScript_obj);
};*/

/*bsp.getCodeStringsArray = function(a_str)//----
{
	a_str = a_str.replace(/[\r\n]/g,'');//Note: carriage return does not work in RegExp (issue investigation in process)
	var lPatternCode_str = '(?:\<script.*?\>)(.*?)(?:(?=\<\/script\>))';//Note: look-behind does not supported by JS now
	var l_str_arr = a_str.match(new RegExp(lPatternCode_str, 'img')) || [];
	var lLength_int = l_str_arr.length;
	for (var i = 0; i < lLength_int; i++)
	{
		l_str_arr[i] = l_str_arr[i].replace(/\<script(.*?)\>/g, '');
	}
	return l_str_arr;
};*/