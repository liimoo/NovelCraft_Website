# NovelCraft WordPress - Claude向け引き継ぎメモ

## プロジェクト概要
- **ノベクラ（NovelCraft）** の公式サイト・開発日記をWordPressで運営
- 記事更新・サイト改修はAI（Claude）に依頼するスタイル

## サイト情報
- トップページ: https://novecra.deca.jp/
- 管理画面: https://novecra.deca.jp/wordpress/wp-admin/
- サーバー: ロリポップ ライトプラン（SSH不可・FTPのみ）

## デプロイ手順
```bash
# 全体デプロイ
bash deploy.sh

# テーマだけ変えた場合（速い）
source .ftpconfig && lftp -c "
open -u $FTP_USER,$FTP_PASS ftp://$FTP_SERVER
mirror -R --only-newer --no-perms \
  $(pwd)/wp-content/themes/cocoon-child-master/ /wordpress/wp-content/themes/cocoon-child-master/
bye
"
```

## git commitの注意
WordPressコアファイルが含まれる場合は必ず `--no-verify` を付ける（pre-commitフックの誤検知のため）：
```bash
git commit --no-verify -m "メッセージ"
```

## X（Twitter）投稿ルール
- 公式アカウント: **@novecra**（このアカウントで投稿する）
- 個人アカウント @li_mo_ では**絶対に投稿しない**
- ハッシュタグ: `#ノベクラ #NovelCraft #ゲーム開発`
- 日記更新時はツイート文を生成してユーザーに渡す

## デザイン方針
- かわいく・やわらかく・とっつきやすいデザインを優先
- 暗すぎる・エッジーすぎるデザインは避ける
- 明るいラベンダー・ピンク・白ベースが好まれる

## 主要ファイルの場所
| ファイル | 用途 |
|---|---|
| `wp-content/themes/cocoon-child-master/front-page.php` | トップページ |
| `wp-content/themes/cocoon-child-master/novel-assets/` | サイト用画像素材 |
| `wp-content/plugins/novelcraft-tweet/` | X投稿ボタンプラグイン |
| `.ftpconfig` | FTP認証情報（git管理外・要作成） |
| `deploy.sh` | デプロイスクリプト |

## .ftpconfigのフォーマット（git管理外・要作成）
```
FTP_SERVER=ftp-1.lolipop.jp
FTP_USER=deca.jp-novecra
FTP_PASS=（ロリポップのパスワード）
FTP_REMOTE_DIR=/wordpress/
```

## ゲーム素材の場所
```
../Assets/ThirdParty/2D NovelGame Starter Pack Vol.01/
├── BG/L/BG01〜BG07/  ← 背景画像（各4バリアント）
└── ST/L/ST01〜ST05/  ← キャラクター立ち絵（衣装A/B・複数表情）
```
サイト用にコピー済み: `novel-assets/bg/` と `novel-assets/characters/`
