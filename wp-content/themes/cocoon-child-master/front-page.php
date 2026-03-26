<?php
/**
 * NovelCraft トップページテンプレート
 */
get_header();
?>
<style>
/* ===== 基本設定 ===== */
.nc-page * { box-sizing: border-box; margin: 0; padding: 0; }
.nc-page {
  font-family: 'Hiragino Kaku Gothic ProN', 'Noto Sans JP', sans-serif;
  background: #fdf8ff;
  color: #3a2460;
  overflow-x: hidden;
}

/* ===== ヒーロー ===== */
.nc-hero {
  position: relative;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  padding: 80px 24px 120px;
  background: linear-gradient(160deg, #fff0fb 0%, #f0e8ff 40%, #e8f4ff 100%);
  overflow: hidden;
}

/* 背景の丸デコ */
.nc-hero::before {
  content: '';
  position: absolute;
  width: 600px; height: 600px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(216,180,254,0.35) 0%, transparent 70%);
  top: -100px; right: -150px;
  pointer-events: none;
}
.nc-hero::after {
  content: '';
  position: absolute;
  width: 400px; height: 400px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(186,230,253,0.4) 0%, transparent 70%);
  bottom: -50px; left: -100px;
  pointer-events: none;
}

/* 浮かぶデコ要素 */
.nc-deco {
  position: absolute;
  pointer-events: none;
  font-size: 28px;
  animation: nc-float var(--dur, 4s) var(--delay, 0s) ease-in-out infinite;
  opacity: 0.7;
}
@keyframes nc-float {
  0%, 100% { transform: translateY(0) rotate(0deg); }
  50% { transform: translateY(-14px) rotate(8deg); }
}

/* ロゴ */
.nc-logo-title {
  font-size: clamp(56px, 11vw, 110px);
  font-weight: 900;
  letter-spacing: 0.03em;
  line-height: 1;
  background: linear-gradient(135deg, #c026d3 0%, #7c3aed 50%, #2563eb 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  position: relative;
  z-index: 1;
  filter: drop-shadow(0 4px 12px rgba(192,38,211,0.2));
}
.nc-logo-yomi {
  font-size: clamp(13px, 2.5vw, 17px);
  letter-spacing: 0.5em;
  color: #a855f7;
  margin-top: 6px;
  margin-bottom: 32px;
  position: relative;
  z-index: 1;
  font-weight: 500;
}

.nc-hero-catch {
  font-size: clamp(22px, 4vw, 38px);
  font-weight: 800;
  line-height: 1.6;
  margin-bottom: 18px;
  position: relative;
  z-index: 1;
  color: #3a2460;
}
.nc-hero-catch .nc-pink { color: #c026d3; }
.nc-hero-catch .nc-blue { color: #2563eb; }

.nc-hero-desc {
  font-size: clamp(14px, 2vw, 17px);
  color: #7c6fa0;
  line-height: 1.9;
  max-width: 500px;
  margin-bottom: 44px;
  position: relative;
  z-index: 1;
}

/* ボタン */
.nc-hero-buttons {
  display: flex;
  gap: 16px;
  flex-wrap: wrap;
  justify-content: center;
  position: relative;
  z-index: 1;
}
.nc-btn {
  display: inline-block;
  padding: 14px 36px;
  border-radius: 50px;
  font-size: 15px;
  font-weight: 700;
  text-decoration: none;
  letter-spacing: 0.05em;
  transition: all 0.25s ease;
  border: none;
  cursor: pointer;
}
.nc-btn-primary {
  background: linear-gradient(135deg, #c026d3, #7c3aed);
  color: #fff;
  box-shadow: 0 6px 24px rgba(192,38,211,0.35);
}
.nc-btn-primary:hover {
  transform: translateY(-3px) scale(1.03);
  box-shadow: 0 10px 32px rgba(192,38,211,0.45);
  color: #fff;
}
.nc-btn-secondary {
  background: #fff;
  color: #7c3aed;
  box-shadow: 0 4px 16px rgba(124,58,237,0.15);
  border: 2px solid rgba(124,58,237,0.2);
}
.nc-btn-secondary:hover {
  transform: translateY(-3px) scale(1.03);
  border-color: #7c3aed;
  color: #7c3aed;
}

/* スクロールヒント */
.nc-scroll-hint {
  position: absolute;
  bottom: 32px;
  left: 50%;
  transform: translateX(-50%);
  font-size: 11px;
  letter-spacing: 0.25em;
  color: #c084fc;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 6px;
  animation: nc-bounce 2s ease-in-out infinite;
  z-index: 1;
}
.nc-scroll-hint::after {
  content: '↓';
  font-size: 16px;
}
@keyframes nc-bounce {
  0%, 100% { transform: translateX(-50%) translateY(0); }
  50% { transform: translateX(-50%) translateY(6px); }
}

/* ===== ノベルウィンドウデモ ===== */
.nc-demo-section {
  padding: 70px 20px;
  background: linear-gradient(180deg, #f0e8ff 0%, #fdf8ff 100%);
  display: flex;
  flex-direction: column;
  align-items: center;
}
.nc-demo-label {
  font-size: 12px;
  letter-spacing: 0.35em;
  color: #a78bfa;
  margin-bottom: 20px;
  font-weight: 600;
}
.nc-demo-screen {
  width: 100%;
  max-width: 680px;
  aspect-ratio: 16/9;
  border-radius: 20px;
  overflow: hidden;
  background: linear-gradient(135deg, #2d1b69 0%, #1e3a5f 100%);
  box-shadow: 0 20px 60px rgba(124,58,237,0.2), 0 4px 20px rgba(0,0,0,0.1);
  position: relative;
  display: flex;
  align-items: flex-end;
  border: 3px solid rgba(216,180,254,0.5);
}
.nc-demo-bg {
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse 80% 60% at 50% 20%, rgba(139,92,246,0.25) 0%, transparent 70%);
}
.nc-demo-char {
  position: absolute;
  bottom: 80px;
  left: 50%;
  transform: translateX(-50%);
  font-size: clamp(60px, 12vw, 100px);
  animation: nc-float 3s ease-in-out infinite;
  filter: drop-shadow(0 8px 20px rgba(192,38,211,0.4));
}
.nc-demo-window {
  position: relative;
  width: 100%;
  padding: 16px 22px 20px;
  background: rgba(253,248,255,0.92);
  backdrop-filter: blur(8px);
  border-top: 2px solid rgba(216,180,254,0.6);
}
.nc-demo-name-tag {
  display: inline-block;
  background: linear-gradient(135deg, #c026d3, #7c3aed);
  color: #fff;
  font-size: 12px;
  font-weight: 700;
  padding: 3px 14px;
  border-radius: 20px;
  margin-bottom: 8px;
  letter-spacing: 0.1em;
}
.nc-demo-text {
  font-size: clamp(12px, 2vw, 15px);
  color: #3a2460;
  line-height: 1.8;
}
.nc-demo-cursor {
  display: inline-block;
  width: 2px;
  height: 14px;
  background: #c026d3;
  margin-left: 2px;
  vertical-align: middle;
  border-radius: 2px;
  animation: nc-blink 1s step-end infinite;
}
@keyframes nc-blink {
  0%, 100% { opacity: 1; } 50% { opacity: 0; }
}

/* ===== セクション共通 ===== */
.nc-section {
  padding: 90px 24px;
}
.nc-section-head {
  text-align: center;
  margin-bottom: 56px;
}
.nc-section-tag {
  display: inline-block;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 0.35em;
  color: #a855f7;
  background: #f5f0ff;
  border: 1px solid rgba(168,85,247,0.25);
  padding: 5px 16px;
  border-radius: 20px;
  margin-bottom: 16px;
}
.nc-section-head h2 {
  font-size: clamp(26px, 5vw, 42px);
  font-weight: 800;
  color: #3a2460;
  line-height: 1.35;
  margin-bottom: 12px;
}
.nc-section-head p {
  font-size: 15px;
  color: #7c6fa0;
  line-height: 1.8;
}

/* ===== 特徴カード ===== */
.nc-features { background: #fdf8ff; }
.nc-features-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
  max-width: 1060px;
  margin: 0 auto;
}
.nc-card {
  background: #fff;
  border-radius: 20px;
  padding: 32px 26px;
  border: 2px solid #f0e8ff;
  transition: all 0.25s ease;
  position: relative;
  overflow: hidden;
}
.nc-card::after {
  content: '';
  position: absolute;
  top: 0; left: 0; right: 0;
  height: 4px;
  background: var(--card-grad);
  border-radius: 4px 4px 0 0;
}
.nc-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 16px 48px rgba(124,58,237,0.12);
  border-color: rgba(168,85,247,0.3);
}
.nc-card-icon { font-size: 44px; margin-bottom: 16px; display: block; }
.nc-card h3 { font-size: 18px; font-weight: 700; color: #3a2460; margin-bottom: 10px; }
.nc-card p { font-size: 14px; color: #7c6fa0; line-height: 1.85; }

/* ===== 2カラム ===== */
.nc-split { background: #f5f0ff; }
.nc-split-inner {
  max-width: 1060px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 56px;
  align-items: center;
}
.nc-split-inner.nc-rev { direction: rtl; }
.nc-split-inner.nc-rev > * { direction: ltr; }

.nc-split-visual {
  background: linear-gradient(135deg, #f5f0ff, #e8f4ff);
  border-radius: 24px;
  aspect-ratio: 4/3;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 90px;
  border: 2px solid rgba(216,180,254,0.4);
  animation: nc-float 4s ease-in-out infinite;
}
.nc-split-text .nc-tag-sm {
  display: inline-block;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 0.3em;
  color: #c026d3;
  margin-bottom: 16px;
}
.nc-split-text h2 {
  font-size: clamp(22px, 3.5vw, 34px);
  font-weight: 800;
  color: #3a2460;
  margin-bottom: 16px;
  line-height: 1.4;
}
.nc-split-text p {
  font-size: 15px;
  color: #7c6fa0;
  line-height: 1.9;
}

/* ===== 開発中バナー ===== */
.nc-dev {
  background: linear-gradient(135deg, #fdf0ff 0%, #f0f0ff 100%);
  border-top: 2px dashed rgba(168,85,247,0.2);
  border-bottom: 2px dashed rgba(168,85,247,0.2);
  text-align: center;
}
.nc-dev-badge {
  display: inline-block;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 0.3em;
  background: linear-gradient(135deg, #c026d3, #7c3aed);
  color: #fff;
  padding: 6px 20px;
  border-radius: 20px;
  margin-bottom: 22px;
}
.nc-dev h2 {
  font-size: clamp(22px, 4vw, 36px);
  font-weight: 800;
  color: #3a2460;
  margin-bottom: 14px;
}
.nc-dev p {
  color: #7c6fa0;
  font-size: 15px;
  line-height: 1.85;
  max-width: 480px;
  margin: 0 auto 32px;
}

/* ===== フッター ===== */
.nc-footer {
  background: #3a2460;
  color: rgba(255,255,255,0.5);
  text-align: center;
  padding: 36px 20px;
  font-size: 13px;
}
.nc-footer a { color: rgba(216,180,254,0.7); text-decoration: none; }

/* ===== レスポンシブ ===== */
@media (max-width: 720px) {
  .nc-split-inner,
  .nc-split-inner.nc-rev { grid-template-columns: 1fr; direction: ltr; }
}
</style>

<div class="nc-page">

  <!-- ヒーロー -->
  <section class="nc-hero">
    <!-- 浮かぶデコ -->
    <div class="nc-deco" style="top:12%;left:8%;--dur:4.5s;--delay:-1s;">✨</div>
    <div class="nc-deco" style="top:20%;right:10%;--dur:3.8s;--delay:-2s;">💜</div>
    <div class="nc-deco" style="bottom:25%;left:12%;--dur:5s;--delay:-0.5s;">⭐</div>
    <div class="nc-deco" style="bottom:30%;right:8%;--dur:4s;--delay:-3s;">🌸</div>
    <div class="nc-deco" style="top:40%;left:4%;--dur:3.5s;--delay:-1.5s;">📖</div>
    <div class="nc-deco" style="top:55%;right:5%;--dur:4.2s;--delay:-2.5s;">🎀</div>

    <div class="nc-logo-title">NovelCraft</div>
    <div class="nc-logo-yomi">ノベクラ</div>

    <div class="nc-hero-catch">
      <span class="nc-pink">読む</span>喜びと、<br>
      <span class="nc-blue">つくる</span>たのしさを。
    </div>

    <p class="nc-hero-desc">
      ノベクラは、ビジュアルノベルを<strong>プレイ</strong>する楽しさと<br>
      自分で<strong>制作</strong>できる喜びをひとつにした<br>
      ノベルゲームプラットフォームです🎉
    </p>

    <div class="nc-hero-buttons">
      <a href="#features" class="nc-btn nc-btn-primary">✨ 特徴を見てみる</a>
      <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="nc-btn nc-btn-secondary">📝 開発日記を読む</a>
    </div>

    <div class="nc-scroll-hint">SCROLL</div>
  </section>

  <!-- デモウィンドウ -->
  <section class="nc-demo-section">
    <p class="nc-demo-label">✦ NOVEL WINDOW ✦</p>
    <div class="nc-demo-screen">
      <div class="nc-demo-bg"></div>
      <div class="nc-demo-char">🧑‍🎤</div>
      <div class="nc-demo-window">
        <div class="nc-demo-name-tag" id="nc-demo-name">???</div>
        <div class="nc-demo-text">
          <span id="nc-demo-content"></span><span class="nc-demo-cursor"></span>
        </div>
      </div>
    </div>
  </section>

  <!-- 特徴 -->
  <section class="nc-section nc-features" id="features">
    <div class="nc-section-head">
      <div class="nc-section-tag">FEATURES</div>
      <h2>ノベクラでできること 🌟</h2>
      <p>遊ぶ人も、つくる人も。みんなのためのノベルプラットフォーム。</p>
    </div>
    <div class="nc-features-grid">

      <div class="nc-card" style="--card-grad: linear-gradient(90deg,#c026d3,#7c3aed);">
        <span class="nc-card-icon">📖</span>
        <h3>リッチなノベル体験</h3>
        <p>キャラクターの立ち絵、背景、選択肢が連動した本格ビジュアルノベルをお楽しみいただけます。テキスト速度もお好みで調整できます。</p>
      </div>

      <div class="nc-card" style="--card-grad: linear-gradient(90deg,#7c3aed,#2563eb);">
        <span class="nc-card-icon">✏️</span>
        <h3>ノベル制作エディタ</h3>
        <p>コーディング不要で自分だけのノベルが作れるCraftモードを開発中！Undo/Redoに対応した直感的な編集環境です。</p>
      </div>

      <div class="nc-card" style="--card-grad: linear-gradient(90deg,#2563eb,#06b6d4);">
        <span class="nc-card-icon">💬</span>
        <h3>豊かなテキスト表現</h3>
        <p>色・サイズ変更、ルビ（振り仮名）など多彩なテキスト装飾に対応。セリフひとつひとつに個性を込められます。</p>
      </div>

      <div class="nc-card" style="--card-grad: linear-gradient(90deg,#ec4899,#f43f5e);">
        <span class="nc-card-icon">🎭</span>
        <h3>かわいいキャラ演出</h3>
        <p>複数の衣装・表情を持つキャラクターが登場！話しているキャラを自動ハイライト表示し、場面を盛り上げます。</p>
      </div>

      <div class="nc-card" style="--card-grad: linear-gradient(90deg,#10b981,#06b6d4);">
        <span class="nc-card-icon">🔀</span>
        <h3>選択肢＆分岐シナリオ</h3>
        <p>あなたの選択が物語を変える！選択肢システムで読み手が能動的に物語に参加できます。</p>
      </div>

      <div class="nc-card" style="--card-grad: linear-gradient(90deg,#f59e0b,#ef4444);">
        <span class="nc-card-icon">💾</span>
        <h3>セーブ＆ロード</h3>
        <p>複数のセーブスロットに対応。好きなところから再開できるので、じっくりと物語を楽しめます。</p>
      </div>

    </div>
  </section>

  <!-- Playセクション -->
  <section class="nc-section nc-split">
    <div class="nc-split-inner">
      <div class="nc-split-visual">🎮</div>
      <div class="nc-split-text">
        <div class="nc-tag-sm">✦ PLAY MODE</div>
        <h2>物語の世界に<br>とびこもう！</h2>
        <p>丁寧に作り込まれた演出とビジュアルで紡がれるノベルを、のんびり読んでみてください。テキスト速度や文字サイズも自分好みにカスタマイズできます📚</p>
      </div>
    </div>
  </section>

  <section class="nc-section" style="background:#fdf8ff;">
    <div class="nc-split-inner nc-rev">
      <div class="nc-split-visual">🛠️</div>
      <div class="nc-split-text">
        <div class="nc-tag-sm">✦ CRAFT MODE</div>
        <h2>あなたの物語を<br>カタチにしよう！</h2>
        <p>Craftモードでキャラクター・背景・セリフ・選択肢を自由に組み合わせてノベルが作れます。むずかしい知識は一切不要。頭の中のアイデアをそのまま形にしてください🌈</p>
      </div>
    </div>
  </section>

  <!-- 開発中バナー -->
  <section class="nc-section nc-dev">
    <div class="nc-dev-badge">🚧 NOW IN DEVELOPMENT</div>
    <h2>現在、がんばって開発中です！</h2>
    <p>ノベクラはまだ開発途中です。<br>新機能や進捗は開発日記でこまめにお知らせしていきます。<br>ぜひチェックしてみてください🎉</p>
    <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="nc-btn nc-btn-primary">📝 開発日記を読む</a>
  </section>

  <!-- フッター -->
  <footer class="nc-footer">
    <p>&copy; <?php echo date('Y'); ?> NovelCraft（ノベクラ）&nbsp;|&nbsp;
    <a href="<?php echo admin_url(); ?>">管理画面</a></p>
  </footer>

</div>

<script>
// デモタイプライター
(function() {
  var scenes = [
    { name: 'ナレーター',  text: 'ここは、あなたの物語が始まる場所。' },
    { name: 'ユイ 💜',    text: 'ねえ、一緒に物語を作ってみない？' },
    { name: 'ナレーター',  text: '選択肢が現れた…どうする？' },
    { name: 'アオ 💙',    text: 'よし！ノベクラで冒険を始めよう！' },
  ];
  var nameEl = document.getElementById('nc-demo-name');
  var textEl = document.getElementById('nc-demo-content');
  if (!nameEl || !textEl) return;
  var si = 0, ci = 0, typing = true;
  function tick() {
    var s = scenes[si];
    nameEl.textContent = s.name;
    if (typing) {
      textEl.textContent = s.text.slice(0, ci++);
      if (ci > s.text.length) { typing = false; setTimeout(tick, 2200); return; }
      setTimeout(tick, 75);
    } else {
      ci = 0; typing = true;
      si = (si + 1) % scenes.length;
      setTimeout(tick, 300);
    }
  }
  setTimeout(tick, 600);
})();

// スムーズスクロール
document.querySelectorAll('a[href^="#"]').forEach(function(a) {
  a.addEventListener('click', function(e) {
    var t = document.querySelector(this.getAttribute('href'));
    if (t) { e.preventDefault(); t.scrollIntoView({ behavior: 'smooth' }); }
  });
});
</script>

<?php get_footer(); ?>
