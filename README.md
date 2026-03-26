# NovelCraft_Wordpress

NovelCraftの紹介サイト・開発日記をWordPressで公開するためのリポジトリです。

## サイト情報

| 項目 | 内容 |
|---|---|
| サイトURL | http://novecra.deca.jp/wordpress/ |
| 管理画面 | http://novecra.deca.jp/wordpress/wp-admin/ |
| サーバー | ロリポップ（ライトプラン） |
| FTPサーバー | ftp-1.lolipop.jp |

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

### 4. deploy.shに実行権限を付与

```bash
chmod +x deploy.sh
```

## デプロイ方法

テーマやファイルを編集後、以下のコマンドを実行：

```bash
bash deploy.sh
```

変更されたファイルだけをロリポップに自動アップロードします（初回のみ全ファイル）。

## 日常の運用フロー

```
1. ファイルを編集（テーマ、プラグインなど）
2. git add & git commit & git push
3. bash deploy.sh でロリポップに反映
```

## リポジトリ構成

```
/
├── wp-content/
│   ├── themes/      ← カスタムテーマはここを編集
│   └── plugins/     ← プラグイン管理
├── .gitignore
├── .ftpconfig       ← FTP認証情報（git管理外・要作成）
├── deploy.sh        ← デプロイスクリプト
└── README.md
```

## 注意事項

- `wp-config.php` はDBパスワードが含まれるためgit管理外です（絶対にcommitしない）
- `.ftpconfig` はFTPパスワードが含まれるためgit管理外です（各自で作成）
- `wp-content/uploads/` はメディアファイルのためgit管理外です
- WordPressの設定変更・記事投稿は管理画面から行います
- テーマ・プラグインのファイル変更のみgitで管理します
