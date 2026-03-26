<?php
/**
 * Plugin Name: NovelCraft Tweet Helper
 * Description: 記事を公開したときにX（Twitter）投稿ボタンを表示します
 * Version: 1.0
 */

if (!defined('ABSPATH')) exit;

/**
 * 投稿後の管理画面にXシェアボタンを表示
 */
add_action('admin_notices', function () {
    // 投稿画面以外は無視
    $screen = get_current_screen();
    if (!$screen || $screen->base !== 'post') return;

    // 公開直後（?message=6 or message=1）のみ表示
    $message = isset($_GET['message']) ? intval($_GET['message']) : 0;
    if (!in_array($message, [1, 6])) return;

    // 対象の投稿を取得
    $post_id = isset($_GET['post']) ? intval($_GET['post']) : 0;
    if (!$post_id) return;

    $post = get_post($post_id);
    if (!$post || $post->post_status !== 'publish') return;

    // ツイート文を自動生成
    $title    = get_the_title($post_id);
    $url      = get_permalink($post_id);
    $hashtags = 'ノベクラ,NovelCraft,ゲーム開発';

    $tweet_text = "【開発日記更新📝】\n{$title}\n\n#ノベクラ #NovelCraft #ゲーム開発\n{$url}";
    $intent_url = 'https://twitter.com/intent/tweet?text=' . rawurlencode("【開発日記更新📝】\n{$title}\n\n") . '&url=' . rawurlencode($url) . '&hashtags=' . rawurlencode($hashtags);

    ?>
    <div class="notice notice-success" style="padding:16px 20px;border-left:4px solid #1d9bf0;">
        <div style="display:flex;align-items:center;gap:16px;flex-wrap:wrap;">
            <div style="flex:1;min-width:200px;">
                <strong style="font-size:15px;">🎉 記事を公開しました！Xでシェアしますか？</strong><br>
                <span style="color:#555;font-size:13px;margin-top:4px;display:block;">
                    以下の内容でツイートが開きます：<br>
                    <code style="background:#f5f5f5;padding:6px 10px;border-radius:4px;display:block;margin-top:6px;white-space:pre-wrap;font-size:12px;">【開発日記更新📝】
<?php echo esc_html($title); ?>

#ノベクラ #NovelCraft #ゲーム開発
<?php echo esc_url($url); ?></code>
                </span>
            </div>
            <a href="<?php echo esc_url($intent_url); ?>"
               target="_blank"
               style="background:#1d9bf0;color:#fff;padding:10px 24px;border-radius:50px;text-decoration:none;font-weight:700;font-size:14px;white-space:nowrap;display:inline-block;">
                𝕏 Xで投稿する
            </a>
        </div>
    </div>
    <?php
});
