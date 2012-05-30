<?php
/**
 * 単純なページネーションを扱うクラス
 *
 * - ページ番号は 1 以上
 * - リンクには前のページと次のページしか使わない
 *
 * @package SimplePagination
 * @author  tatsuya.tsuruoka@gmail.com
 * @url     https://github.com/ttsuruoka/php-simple-pagination
 */
class SimplePagination
{
    public $current;        // 現在のページ番号
    public $prev;           // ひとつ前のページ番号
    public $next;           // ひとつ次のページ番号
    public $count;          // 1ページに何件表示するか
    public $start_index;    // 何件目から表示するか（1オリジン）
    public $is_last_page;   // 最終ページかどうか

    public function __construct($current, $count)
    {
        $this->current = $current;
        $this->count = $count;
        $this->prev = max($current - 1, 0);
        $this->next = $current + 1;
        $this->start_index = ($current - 1) * $count + 1;
    }

    /**
     * 最終ページかどうか判定する
     *
     * このメソッドの前に、アイテムを1ページに表示する件数 + 1 個取得しておく。
     * 取得できたアイテムの数が1ページに表示する件数以下だったとき、
     * 現在のページが最終ページであることが分かる。
     *
     * 最終ページではなかったときは余分に取得したアイテムを破棄する。
     *
     * @param array &$items 取得できたアイテムの数から最終ページかどうか判断する。
     * @return void
     */
    public function checkLastPage(array &$items)
    {
        if (count($items) <= $this->count) {
            $this->is_last_page = true;
        } else {
            $this->is_last_page = false;
            array_pop($items);
        }
    }
}
