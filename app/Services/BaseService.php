<?php

namespace App\Services;

class BaseService
{
    function getJson_last_error($errorCode)
    {
        $errorData = array(
            "JSON_ERROR_NONE (沒有錯誤發生)",
            "JSON_ERROR_DEPTH (到達了最大堆棧深度)",
            "JSON_ERROR_STATE_MISMATCH (無效或異常的JSON)",
            "JSON_ERROR_CTRL_CHAR (控制字符錯誤,可能是編碼不對)",
            "JSON_ERROR_SYNTAX (語法錯誤)",
            "JSON_ERROR_UTF8 (異常的UTF-8 字符,也許是因為不正確的編碼)",
            "JSON_ERROR_RECURSION (要編碼的值中的一個或多個遞歸引用)",
            "JSON_ERROR_INF_OR_NAN (要編碼的值中的一個或多個NAN或INF值)",
            "JSON_ERROR_UNSUPPORTED_TYPE (指定的類型,值無法編碼)",
            "JSON_ERROR_INVALID_PROPERTY_NAME (指定的屬性名無法編碼)",
            "JSON_ERROR_UTF16 (畸形的UTF-16 字符,可能因為字符編碼不正確)");
        $errorStr = $errorData[$errorCode];
        return $errorStr;
    }
}