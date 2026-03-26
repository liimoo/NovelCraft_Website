#!/bin/bash
# ロリポップへデプロイするスクリプト

SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
CONFIG="$SCRIPT_DIR/.ftpconfig"

if [ ! -f "$CONFIG" ]; then
  echo "エラー: .ftpconfig が見つかりません"
  exit 1
fi

source "$CONFIG"

echo "ロリポップへデプロイ中..."

lftp -c "
open -u $FTP_USER,$FTP_PASS ftp://$FTP_SERVER
mirror -R \
  --only-newer \
  --no-perms \
  --verbose \
  --exclude-glob .git \
  --exclude-glob .ftpconfig \
  --exclude-glob deploy.sh \
  --exclude-glob wp-config.php \
  --exclude-glob wp-content/uploads \
  --exclude-glob wp-content/cache \
  --exclude-glob wp-content/upgrade \
  $SCRIPT_DIR/ $FTP_REMOTE_DIR
bye
"

echo "デプロイ完了！"
