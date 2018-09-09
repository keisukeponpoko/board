<?php

namespace App\Helpers;

use Illuminate\Http\Request;

class Helper
{
    /**
     * コメント表示する関数
     * 1. escape処理
     * 2. 改行コードを<br>に置換
     * 3. >>5 といったアンカーがある場合、リンクを付与
     * {!! Helper::comment_display($comment) !!}
     *
     * @param string $comment
     * @return string
     */
    static function comment_display($comment)
    {
        $comment = nl2br(e($comment), false);

        $current_path = request()->getRequestUri();
        $replace = sprintf("<a href='%s#post$2'>$1</a>", $current_path);
        // &gt;&gt; = >> のエスケープ
        $comment = preg_replace('/(&gt;&gt;(\d+))/', $replace, $comment);

        return $comment;
    }
}

?>
