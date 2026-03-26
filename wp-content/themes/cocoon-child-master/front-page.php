<?php
/**
 * NovelCraft トップページテンプレート
 */
get_header();
$theme_url = get_stylesheet_directory_uri();
?>
<style>
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
  padding: 100px 24px 160px;
  overflow: hidden;
}
.nc-hero-bg {
  position: absolute;
  inset: 0;
  background-image: url('<?php echo $theme_url; ?>/novel-assets/bg/hero_bg.png');
  background-size: cover;
  background-position: center;
  filter: brightness(0.55) saturate(0.9);
}
.nc-hero-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(
    to bottom,
    rgba(10,5,30,0.3) 0%,
    rgba(10,5,30,0.2) 50%,
    rgba(253,248,255,1) 100%
  );
}

/* ヒーローのキャラクター */
.nc-hero-chara {
  position: absolute;
  bottom: 80px;
  height: 75%;
  max-height: 580px;
  object-fit: contain;
  filter: drop-shadow(0 8px 32px rgba(80,30,150,0.4));
  pointer-events: none;
  animation: nc-float 5s ease-in-out infinite;
}
.nc-hero-chara-left  { left: 2%;  transform-origin: bottom left; }
.nc-hero-chara-right { right: 2%; transform-origin: bottom right; animation-delay: -2s; }
@keyframes nc-float {
  0%,100% { transform: translateY(0); }
  50%      { transform: translateY(-12px); }
}
@media (max-width: 900px) {
  .nc-hero-chara-left  { left: -5%; height: 55%; }
  .nc-hero-chara-right { right: -5%; height: 55%; }
}
@media (max-width: 600px) {
  .nc-hero-chara { display: none; }
}

/* ロゴ・テキスト */
.nc-hero-content { position: relative; z-index: 2; }
.nc-logo-title {
  font-size: clamp(52px, 10vw, 100px);
  font-weight: 900;
  letter-spacing: 0.03em;
  line-height: 1;
  background: linear-gradient(135deg, #fff 0%, #e8d5ff 50%, #bfdbfe 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  filter: drop-shadow(0 4px 24px rgba(150,80,255,0.5));
}
.nc-logo-yomi {
  font-size: clamp(13px, 2.5vw, 17px);
  letter-spacing: 0.5em;
  color: rgba(230,210,255,0.9);
  margin-top: 6px;
  margin-bottom: 28px;
  font-weight: 500;
  text-shadow: 0 2px 8px rgba(0,0,0,0.3);
}
.nc-hero-catch {
  font-size: clamp(20px, 3.5vw, 34px);
  font-weight: 800;
  line-height: 1.6;
  margin-bottom: 18px;
  color: #fff;
  text-shadow: 0 2px 16px rgba(0,0,0,0.4);
}
.nc-hero-catch .nc-pink { color: #f9a8d4; }
.nc-hero-catch .nc-blue { color: #bfdbfe; }
.nc-hero-desc {
  font-size: clamp(13px, 2vw, 16px);
  color: rgba(240,235,255,0.85);
  line-height: 1.9;
  max-width: 480px;
  margin: 0 auto 40px;
  text-shadow: 0 1px 8px rgba(0,0,0,0.4);
}
.nc-hero-buttons {
  display: flex;
  gap: 16px;
  flex-wrap: wrap;
  justify-content: center;
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
  box-shadow: 0 6px 24px rgba(192,38,211,0.45);
}
.nc-btn-primary:hover {
  transform: translateY(-3px) scale(1.03);
  box-shadow: 0 10px 32px rgba(192,38,211,0.6);
  color: #fff;
}
.nc-btn-secondary {
  background: rgba(255,255,255,0.15);
  color: #fff;
  border: 2px solid rgba(255,255,255,0.5);
  backdrop-filter: blur(4px);
}
.nc-btn-secondary:hover {
  background: rgba(255,255,255,0.25);
  transform: translateY(-3px);
  color: #fff;
}

.nc-scroll-hint {
  position: absolute;
  bottom: 100px;
  left: 50%;
  transform: translateX(-50%);
  z-index: 2;
  font-size: 11px;
  letter-spacing: 0.25em;
  color: rgba(255,255,255,0.6);
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 6px;
  animation: nc-bounce 2s ease-in-out infinite;
}
.nc-scroll-hint::after { content: '↓'; font-size: 16px; }
@keyframes nc-bounce {
  0%,100% { transform: translateX(-50%) translateY(0); }
  50%      { transform: translateX(-50%) translateY(6px); }
}

/* ===== デモウィンドウ ===== */
.nc-demo-section {
  padding: 0 20px 80px;
  background: #fdf8ff;
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: -1px;
}
.nc-demo-label {
  font-size: 12px;
  letter-spacing: 0.35em;
  color: #a78bfa;
  margin-bottom: 20px;
  font-weight: 600;
  padding-top: 60px;
}
.nc-demo-screen {
  width: 100%;
  max-width: 720px;
  aspect-ratio: 16/9;
  border-radius: 20px;
  overflow: hidden;
  position: relative;
  display: flex;
  align-items: flex-end;
  border: 3px solid rgba(216,180,254,0.4);
  box-shadow: 0 20px 60px rgba(124,58,237,0.15), 0 4px 20px rgba(0,0,0,0.08);
}
.nc-demo-bg-img {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  filter: brightness(0.85);
}
.nc-demo-char-img {
  position: absolute;
  bottom: 60px;
  left: 50%;
  transform: translateX(-50%);
  height: 80%;
  object-fit: contain;
  filter: drop-shadow(0 4px 16px rgba(80,30,150,0.4));
  animation: nc-float 4s ease-in-out infinite;
}
.nc-demo-window {
  position: relative;
  width: 100%;
  padding: 14px 22px 18px;
  background: rgba(253,248,255,0.92);
  backdrop-filter: blur(8px);
  border-top: 2px solid rgba(216,180,254,0.5);
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
@keyframes nc-blink { 0%,100%{opacity:1} 50%{opacity:0} }

/* ===== キャラクター紹介 ===== */
.nc-characters {
  padding: 80px 24px;
  background: linear-gradient(180deg, #fdf8ff 0%, #f5f0ff 100%);
  text-align: center;
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
  margin-bottom: 14px;
}
.nc-section-title {
  font-size: clamp(26px, 5vw, 40px);
  font-weight: 800;
  color: #3a2460;
  margin-bottom: 10px;
}
.nc-section-lead {
  font-size: 15px;
  color: #7c6fa0;
  margin-bottom: 56px;
}
.nc-chara-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 0;
  max-width: 1000px;
  margin: 0 auto;
  align-items: end;
}
.nc-chara-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  transition: transform 0.3s ease;
}
.nc-chara-item:hover { transform: translateY(-12px); }
.nc-chara-item img {
  width: 100%;
  max-width: 220px;
  object-fit: contain;
  filter: drop-shadow(0 8px 20px rgba(124,58,237,0.2));
}
.nc-chara-name {
  margin-top: 12px;
  font-size: 13px;
  font-weight: 700;
  color: #7c3aed;
  letter-spacing: 0.1em;
}
@media (max-width: 720px) {
  .nc-chara-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 400px) {
  .nc-chara-grid { grid-template-columns: repeat(2, 1fr); }
}

/* ===== 特徴カード ===== */
.nc-features {
  padding: 90px 24px;
  background: #fdf8ff;
}
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
}
.nc-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 16px 48px rgba(124,58,237,0.12);
  border-color: rgba(168,85,247,0.3);
}
.nc-card-icon { font-size: 44px; margin-bottom: 16px; display: block; }
.nc-card h3 { font-size: 18px; font-weight: 700; color: #3a2460; margin-bottom: 10px; }
.nc-card p  { font-size: 14px; color: #7c6fa0; line-height: 1.85; }

/* ===== 開発中バナー ===== */
.nc-dev {
  padding: 80px 24px;
  background: linear-gradient(135deg, #fdf0ff, #f0f0ff);
  text-align: center;
  border-top: 2px dashed rgba(168,85,247,0.2);
  position: relative;
  overflow: hidden;
}
.nc-dev-bg-img {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  opacity: 0.08;
}
.nc-dev-inner { position: relative; z-index: 1; }
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
.nc-dev h2 { font-size: clamp(22px, 4vw, 36px); font-weight: 800; color: #3a2460; margin-bottom: 14px; }
.nc-dev p { color: #7c6fa0; font-size: 15px; line-height: 1.85; max-width: 480px; margin: 0 auto 32px; }

/* ===== フッター ===== */
.nc-footer {
  background: #3a2460;
  color: rgba(255,255,255,0.5);
  text-align: center;
  padding: 36px 20px;
  font-size: 13px;
}
.nc-footer a { color: rgba(216,180,254,0.7); text-decoration: none; }
</style>

<div class="nc-page">

  <!-- ヒーロー -->
  <section class="nc-hero">
    <div class="nc-hero-bg"></div>
    <div class="nc-hero-overlay"></div>

    <!-- 左右キャラクター -->
    <img class="nc-hero-chara nc-hero-chara-left"
         src="<?php echo $theme_url; ?>/novel-assets/characters/chara3.png" alt="">
    <img class="nc-hero-chara nc-hero-chara-right"
         src="<?php echo $theme_url; ?>/novel-assets/characters/chara2.png" alt="">

    <div class="nc-hero-content">
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
        <a href="#characters" class="nc-btn nc-btn-primary">✨ キャラを見る</a>
        <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="nc-btn nc-btn-secondary">📝 開発日記を読む</a>
      </div>
    </div>
    <div class="nc-scroll-hint">SCROLL</div>
  </section>

  <!-- デモウィンドウ -->
  <section class="nc-demo-section">
    <p class="nc-demo-label">✦ NOVEL WINDOW ✦</p>
    <div class="nc-demo-screen">
      <img class="nc-demo-bg-img"
           src="<?php echo $theme_url; ?>/novel-assets/bg/classroom.png" alt="">
      <img class="nc-demo-char-img"
           src="<?php echo $theme_url; ?>/novel-assets/characters/chara1.png" alt="" id="nc-demo-char-img">
      <div class="nc-demo-window">
        <div class="nc-demo-name-tag" id="nc-demo-name">???</div>
        <div class="nc-demo-text">
          <span id="nc-demo-content"></span><span class="nc-demo-cursor"></span>
        </div>
      </div>
    </div>
  </section>

  <!-- キャラクター紹介 -->
  <section class="nc-characters" id="characters">
    <div class="nc-section-tag">CHARACTERS</div>
    <h2 class="nc-section-title">個性豊かなキャラクターたち 🌸</h2>
    <p class="nc-section-lead">ノベクラに登場するキャラクターをご紹介。物語の世界で出会いましょう。</p>
    <div class="nc-chara-grid">
      <div class="nc-chara-item">
        <img src="<?php echo $theme_url; ?>/novel-assets/characters/chara1.png" alt="キャラクター1">
        <div class="nc-chara-name">ST-01</div>
      </div>
      <div class="nc-chara-item">
        <img src="<?php echo $theme_url; ?>/novel-assets/characters/chara2.png" alt="キャラクター2">
        <div class="nc-chara-name">ST-02</div>
      </div>
      <div class="nc-chara-item">
        <img src="<?php echo $theme_url; ?>/novel-assets/characters/chara3.png" alt="キャラクター3">
        <div class="nc-chara-name">ST-03</div>
      </div>
      <div class="nc-chara-item">
        <img src="<?php echo $theme_url; ?>/novel-assets/characters/chara4.png" alt="キャラクター4">
        <div class="nc-chara-name">ST-05</div>
      </div>
    </div>
  </section>

  <!-- 特徴 -->
  <section class="nc-features" id="features">
    <div style="text-align:center;margin-bottom:56px;">
      <div class="nc-section-tag">FEATURES</div>
      <h2 class="nc-section-title">ノベクラでできること 🌟</h2>
      <p class="nc-section-lead">遊ぶ人も、つくる人も。みんなのためのノベルプラットフォーム。</p>
    </div>
    <div class="nc-features-grid">
      <div class="nc-card" style="--card-grad:linear-gradient(90deg,#c026d3,#7c3aed)">
        <span class="nc-card-icon">📖</span>
        <h3>リッチなノベル体験</h3>
        <p>キャラクターの立ち絵、背景、選択肢が連動した本格ビジュアルノベルをお楽しみいただけます。</p>
      </div>
      <div class="nc-card" style="--card-grad:linear-gradient(90deg,#7c3aed,#2563eb)">
        <span class="nc-card-icon">✏️</span>
        <h3>ノベル制作エディタ</h3>
        <p>コーディング不要で自分だけのノベルが作れるCraftモードを開発中！直感的な編集環境です。</p>
      </div>
      <div class="nc-card" style="--card-grad:linear-gradient(90deg,#2563eb,#06b6d4)">
        <span class="nc-card-icon">💬</span>
        <h3>豊かなテキスト表現</h3>
        <p>色・サイズ変更、ルビ（振り仮名）など多彩なテキスト装飾に対応。セリフに個性を込められます。</p>
      </div>
      <div class="nc-card" style="--card-grad:linear-gradient(90deg,#ec4899,#f43f5e)">
        <span class="nc-card-icon">🎭</span>
        <h3>キャラクター演出</h3>
        <p>複数の衣装・表情を持つキャラクターが登場！話しているキャラを自動ハイライト表示します。</p>
      </div>
      <div class="nc-card" style="--card-grad:linear-gradient(90deg,#10b981,#06b6d4)">
        <span class="nc-card-icon">🔀</span>
        <h3>選択肢＆分岐シナリオ</h3>
        <p>あなたの選択が物語を変える！読み手が能動的に物語に参加できます。</p>
      </div>
      <div class="nc-card" style="--card-grad:linear-gradient(90deg,#f59e0b,#ef4444)">
        <span class="nc-card-icon">💾</span>
        <h3>セーブ＆ロード</h3>
        <p>複数のセーブスロットに対応。好きなところから再開できます。</p>
      </div>
    </div>
  </section>

  <!-- 開発中バナー -->
  <section class="nc-dev">
    <img class="nc-dev-bg-img" src="<?php echo $theme_url; ?>/novel-assets/bg/school_gate.png" alt="">
    <div class="nc-dev-inner">
      <div class="nc-dev-badge">🚧 NOW IN DEVELOPMENT</div>
      <h2>現在、がんばって開発中です！</h2>
      <p>ノベクラはまだ開発途中です。<br>新機能や進捗は開発日記でこまめにお知らせしていきます🎉</p>
      <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="nc-btn nc-btn-primary">📝 開発日記を読む</a>
    </div>
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
  var baseUrl = '<?php echo $theme_url; ?>/novel-assets/characters/';
  var scenes = [
    { name: 'アリス',  img: 'chara1.png', text: 'ここは、あなたの物語が始まる場所よ。' },
    { name: 'ルナ',   img: 'chara2.png', text: 'ねえ、一緒に物語を作ってみない？絶対楽しいって！' },
    { name: 'ミア',   img: 'chara3.png', text: 'どんな物語でも…きっと素敵になるよ。' },
    { name: 'サクラ', img: 'chara4.png', text: 'よし！ノベクラで最高の冒険を始めよう！' },
  ];
  var nameEl    = document.getElementById('nc-demo-name');
  var textEl    = document.getElementById('nc-demo-content');
  var charImg   = document.getElementById('nc-demo-char-img');
  if (!nameEl || !textEl) return;

  var si = 0, ci = 0, typing = true;
  function tick() {
    var s = scenes[si];
    nameEl.textContent = s.name;
    if (charImg) charImg.src = baseUrl + s.img;
    if (typing) {
      textEl.textContent = s.text.slice(0, ci++);
      if (ci > s.text.length) { typing = false; setTimeout(tick, 2200); return; }
      setTimeout(tick, 70);
    } else {
      ci = 0; typing = true;
      si = (si + 1) % scenes.length;
      setTimeout(tick, 300);
    }
  }
  setTimeout(tick, 600);
})();

document.querySelectorAll('a[href^="#"]').forEach(function(a) {
  a.addEventListener('click', function(e) {
    var t = document.querySelector(this.getAttribute('href'));
    if (t) { e.preventDefault(); t.scrollIntoView({ behavior: 'smooth' }); }
  });
});
</script>

<?php get_footer(); ?>
