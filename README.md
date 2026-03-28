# NovelCraft_Wordpress

NovelCraftの紹介サイト・開発日記をWordPressで公開するためのリポジトリです。

## サイト情報

| 項目 | 内容 |
|---|---|
| サイトURL | https://novecra.deca.jp/ |
| WordPress管理画面 | https://novecra.deca.jp/wordpress/wp-admin/ |
| サーバー | ロリポップ（ライトプラン） |
| FTPサーバー | ftp-1.lolipop.jp |

---

## 開発日記の更新フロー（AIに依頼する場合）

記事の更新・X投稿はAI（Claude Code等）に依頼することを想定しています。

### 依頼のしかた

Claude Codeに以下のように伝えるだけでOKです：

```
今日の開発日記を更新して。内容は〇〇です。
```

AIが行う作業：
1. WordPress REST APIで記事を作成・公開（`.wpconfig`の認証情報を使用）
2. ツイート文を生成して提示

### X（Twitter）への投稿

記事を公開すると、WordPress管理画面に **「𝕏 Xで投稿する」ボタン** が自動表示されます。
ボタンを押すとXがツイート内容入力済みの状態で開くので、確認して「ポスト」を押すだけです。

AIに依頼した場合はAIがツイート文を生成して渡すので、それをコピペしてXに投稿してください。

ハッシュタグ: `#ノベクラ #NovelCraft #ゲーム開発`

---

## 初回セットアップ

### 1. リポジトリをクローン

```bash
git clone git@github.com:liimoo/NovelCraft_Wordpress.git
```

### 2. lftpをインストール（macOS）

```bash
brew install lftp
```

### 3. FTP設定ファイルを作成

`.ftpconfig` ファイルを作成（このファイルはgit管理外）：

```
FTP_SERVER=ftp-1.lolipop.jp
FTP_USER=ロリポップFTPユーザー名
FTP_PASS=ロリポップFTPパスワード
FTP_REMOTE_DIR=/wordpress/
```

FTP情報はロリポップ管理画面 → サーバーの管理・設定 → FTP情報 で確認できます。

### 4. REST API設定ファイルを作成

`.wpconfig` ファイルを作成（このファイルはgit管理外）：

```
WP_API=https://novecra.deca.jp/wordpress/wp-json/wp/v2
WP_USER=WordPressユーザー名
WP_PASS=アプリケーションパスワード
```

Application Passwordの発行：WordPress管理画面 → プロフィール → 「アプリケーションパスワード」

### 5. deploy.shに実行権限を付与

```bash
chmod +x deploy.sh
```

---

## デプロイ方法

テーマやファイルを編集後：

```bash
bash deploy.sh
```

変更されたファイルだけをロリポップに自動アップロードします（初回のみ全ファイル）。

### テーマだけ変更した場合（高速）

```bash
source .ftpconfig && lftp -c "
open -u $FTP_USER,$FTP_PASS ftp://$FTP_SERVER
mirror -R --only-newer --no-perms \
  $(pwd)/wp-content/themes/cocoon-child-master/ /wordpress/wp-content/themes/cocoon-child-master/
bye
"
```

---

## git commitの注意

WordPressコアファイルを含む場合、pre-commitフックが誤検知するため `--no-verify` を使います：

```bash
git commit --no-verify -m "コミットメッセージ"
```

テーマ・プラグインなど自作ファイルのみの場合は通常のcommitでOKです。

---

## リポジトリ構成

```
/
├── wp-content/
│   ├── themes/
│   │   └── cocoon-child-master/     ← カスタムテーマ
│   │       ├── front-page.php       ← トップページテンプレート
│   │       └── novel-assets/        ← サイト用画像素材
│   │           ├── bg/              ← 背景画像
│   │           └── characters/      ← キャラクター画像
│   └── plugins/
│       └── novelcraft-tweet/        ← X投稿ボタンプラグイン
├── .gitignore
├── .ftpconfig       ← FTP認証情報（git管理外・要作成）
├── deploy.sh        ← デプロイスクリプト
└── README.md
```

---

## 注意事項

- `wp-config.php` はDBパスワードが含まれるためgit管理外（絶対にcommitしない）
- `.ftpconfig` はFTPパスワードが含まれるためgit管理外（各自で作成）
- `wp-content/uploads/` はメディアファイルのためgit管理外
- 記事投稿はREST API（`.wpconfig`）で行う。管理画面からでも可
- テーマ・プラグインのファイル変更のみgitで管理する
- `.wpconfig` はAPI認証情報が含まれるためgit管理外（各自で作成）
