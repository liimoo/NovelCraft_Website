<?php
/**
 * NovelCraft トップページテンプレート
 */
get_header();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
/* ===== リセット & 基本設定 ===== */
.nc-page * { box-sizing: border-box; margin: 0; padding: 0; }
.nc-page {
  font-family: 'Hiragino Kaku Gothic ProN', 'Noto Sans JP', sans-serif;
  background: #05050f;
  color: #f0f0ff;
  overflow-x: hidden;
}

/* ===== ヒーローセクション ===== */
.nc-hero {
  position: relative;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  padding: 80px 20px;
  overflow: hidden;
}

/* 背景グラデーション */
.nc-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background:
    radial-gradient(ellipse 80% 60% at 50% 30%, rgba(120, 60, 200, 0.35) 0%, transparent 70%),
    radial-gradient(ellipse 60% 40% at 20% 80%, rgba(40, 80, 200, 0.2) 0%, transparent 60%),
    radial-gradient(ellipse 40% 30% at 80% 70%, rgba(200, 80, 150, 0.15) 0%, transparent 60%);
  pointer-events: none;
}

/* 星のアニメーション */
.nc-stars {
  position: absolute;
  inset: 0;
  pointer-events: none;
}
.nc-star {
  position: absolute;
  background: #fff;
  border-radius: 50%;
  animation: nc-twinkle var(--dur) var(--delay) infinite;
  opacity: 0;
}
@keyframes nc-twinkle {
  0%, 100% { opacity: 0; transform: scale(0.5); }
  50% { opacity: var(--op); transform: scale(1); }
}

/* ロゴ */
.nc-logo-wrapper {
  position: relative;
  z-index: 1;
  margin-bottom: 32px;
}
.nc-logo-title {
  font-size: clamp(52px, 10vw, 100px);
  font-weight: 900;
  letter-spacing: 0.05em;
  line-height: 1;
  background: linear-gradient(135deg, #c084fc 0%, #818cf8 40%, #38bdf8 70%, #c084fc 100%);
  background-size: 300% 300%;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  animation: nc-gradient-shift 6s ease infinite;
  filter: drop-shadow(0 0 40px rgba(139, 92, 246, 0.6));
}
@keyframes nc-gradient-shift {
  0%, 100% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
}
.nc-logo-sub {
  font-size: clamp(14px, 2.5vw, 18px);
  letter-spacing: 0.4em;
  color: rgba(192, 132, 252, 0.8);
  margin-top: 8px;
  font-weight: 300;
}

/* キャッチコピー */
.nc-hero-catch {
  position: relative;
  z-index: 1;
  font-size: clamp(20px, 4vw, 36px);
  font-weight: 700;
  margin-bottom: 20px;
  line-height: 1.6;
  text-shadow: 0 0 40px rgba(139, 92, 246, 0.5);
}
.nc-hero-catch span {
  color: #c084fc;
}

.nc-hero-desc {
  position: relative;
  z-index: 1;
  font-size: clamp(14px, 2vw, 18px);
  color: rgba(200, 200, 255, 0.75);
  max-width: 560px;
  line-height: 1.8;
  margin-bottom: 48px;
}

/* CTAボタン */
.nc-hero-buttons {
  position: relative;
  z-index: 1;
  display: flex;
  gap: 20px;
  flex-wrap: wrap;
  justify-content: center;
}
.nc-btn {
  display: inline-block;
  padding: 14px 40px;
  border-radius: 50px;
  font-size: 16px;
  font-weight: 700;
  text-decoration: none;
  letter-spacing: 0.05em;
  transition: all 0.3s ease;
  cursor: pointer;
  border: none;
}
.nc-btn-primary {
  background: linear-gradient(135deg, #7c3aed, #4f46e5);
  color: #fff;
  box-shadow: 0 0 30px rgba(124, 58, 237, 0.5), 0 4px 20px rgba(0,0,0,0.3);
}
.nc-btn-primary:hover {
  transform: translateY(-3px);
  box-shadow: 0 0 50px rgba(124, 58, 237, 0.8), 0 8px 30px rgba(0,0,0,0.4);
  color: #fff;
}
.nc-btn-secondary {
  background: transparent;
  color: #c084fc;
  border: 2px solid rgba(192, 132, 252, 0.5);
}
.nc-btn-secondary:hover {
  background: rgba(192, 132, 252, 0.1);
  border-color: #c084fc;
  transform: translateY(-3px);
  color: #c084fc;
}

/* スクロールインジケーター */
.nc-scroll-hint {
  position: absolute;
  bottom: 40px;
  left: 50%;
  transform: translateX(-50%);
  z-index: 1;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 8px;
  color: rgba(192, 132, 252, 0.6);
  font-size: 12px;
  letter-spacing: 0.2em;
  animation: nc-bounce 2s infinite;
}
@keyframes nc-bounce {
  0%, 100% { transform: translateX(-50%) translateY(0); }
  50% { transform: translateX(-50%) translateY(8px); }
}
.nc-scroll-hint::after {
  content: '';
  width: 1px;
  height: 40px;
  background: linear-gradient(to bottom, rgba(192,132,252,0.6), transparent);
}

/* ===== ノベルウィンドウ風デモ ===== */
.nc-demo-section {
  padding: 80px 20px;
  display: flex;
  justify-content: center;
  background: linear-gradient(180deg, #05050f 0%, #0c0820 50%, #05050f 100%);
}
.nc-demo-wrapper {
  width: 100%;
  max-width: 720px;
}
.nc-demo-label {
  text-align: center;
  font-size: 13px;
  letter-spacing: 0.3em;
  color: rgba(192,132,252,0.6);
  margin-bottom: 24px;
}
.nc-demo-screen {
  border-radius: 16px;
  overflow: hidden;
  border: 1px solid rgba(139, 92, 246, 0.3);
  box-shadow: 0 0 60px rgba(139, 92, 246, 0.2), inset 0 0 40px rgba(0,0,0,0.5);
  aspect-ratio: 16/9;
  background: linear-gradient(135deg, #1a0533 0%, #0d1a3a 50%, #0a2433 100%);
  position: relative;
  display: flex;
  align-items: flex-end;
}
/* 背景装飾 */
.nc-demo-bg-deco {
  position: absolute;
  inset: 0;
  background:
    radial-gradient(ellipse 60% 80% at 50% 30%, rgba(80,30,150,0.3) 0%, transparent 70%),
    linear-gradient(to bottom, rgba(0,20,60,0.3) 0%, transparent 60%);
}
/* キャラクターシルエット */
.nc-demo-character {
  position: absolute;
  bottom: 100px;
  left: 50%;
  transform: translateX(-50%);
  width: 160px;
  height: 280px;
  background: linear-gradient(to top, rgba(150,80,220,0.4), rgba(80,120,220,0.2));
  clip-path: polygon(30% 0%, 70% 0%, 85% 15%, 90% 40%, 85% 60%, 70% 70%, 65% 100%, 35% 100%, 30% 70%, 15% 60%, 10% 40%, 15% 15%);
  filter: blur(1px);
  animation: nc-char-float 4s ease-in-out infinite;
}
@keyframes nc-char-float {
  0%, 100% { transform: translateX(-50%) translateY(0); }
  50% { transform: translateX(-50%) translateY(-8px); }
}
/* メッセージウィンドウ */
.nc-demo-window {
  position: relative;
  width: 100%;
  padding: 20px 24px;
  background: rgba(5, 5, 20, 0.85);
  backdrop-filter: blur(8px);
  border-top: 1px solid rgba(139, 92, 246, 0.4);
}
.nc-demo-name {
  display: inline-block;
  background: linear-gradient(135deg, #7c3aed, #4f46e5);
  color: #fff;
  font-size: 13px;
  font-weight: 700;
  padding: 3px 16px;
  border-radius: 4px;
  margin-bottom: 10px;
  letter-spacing: 0.1em;
}
.nc-demo-text {
  font-size: clamp(13px, 2vw, 16px);
  color: #e8e8ff;
  line-height: 1.8;
  letter-spacing: 0.05em;
}
.nc-demo-cursor {
  display: inline-block;
  width: 10px;
  height: 16px;
  background: #c084fc;
  margin-left: 4px;
  vertical-align: middle;
  animation: nc-cursor-blink 1s step-end infinite;
}
@keyframes nc-cursor-blink {
  0%, 100% { opacity: 1; }
  50% { opacity: 0; }
}

/* ===== 特徴セクション ===== */
.nc-features {
  padding: 100px 20px;
  background: #05050f;
}
.nc-section-title {
  text-align: center;
  margin-bottom: 16px;
}
.nc-section-title h2 {
  font-size: clamp(28px, 5vw, 44px);
  font-weight: 800;
  background: linear-gradient(135deg, #c084fc, #818cf8);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.nc-section-lead {
  text-align: center;
  color: rgba(200,200,255,0.6);
  font-size: 15px;
  margin-bottom: 64px;
  letter-spacing: 0.05em;
}

.nc-features-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
  gap: 24px;
  max-width: 1100px;
  margin: 0 auto;
}
.nc-feature-card {
  background: linear-gradient(135deg, rgba(30,15,60,0.8), rgba(15,20,50,0.8));
  border: 1px solid rgba(139, 92, 246, 0.2);
  border-radius: 20px;
  padding: 36px 28px;
  transition: all 0.4s ease;
  position: relative;
  overflow: hidden;
}
.nc-feature-card::before {
  content: '';
  position: absolute;
  top: 0; left: 0; right: 0;
  height: 2px;
  background: linear-gradient(90deg, transparent, var(--card-color), transparent);
  opacity: 0;
  transition: opacity 0.3s;
}
.nc-feature-card:hover {
  transform: translateY(-8px);
  border-color: rgba(139, 92, 246, 0.5);
  box-shadow: 0 20px 60px rgba(139, 92, 246, 0.2);
}
.nc-feature-card:hover::before { opacity: 1; }

.nc-feature-icon {
  font-size: 48px;
  margin-bottom: 20px;
  display: block;
}
.nc-feature-card h3 {
  font-size: 20px;
  font-weight: 700;
  margin-bottom: 12px;
  color: #e8e8ff;
}
.nc-feature-card p {
  font-size: 14px;
  color: rgba(200,200,255,0.65);
  line-height: 1.8;
}

/* ===== 2カラムセクション（Play & Craft） ===== */
.nc-two-col {
  padding: 80px 20px;
  background: linear-gradient(180deg, #05050f 0%, #080515 100%);
}
.nc-two-col-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 48px;
  align-items: center;
}
.nc-two-col-inner.nc-reverse { direction: rtl; }
.nc-two-col-inner.nc-reverse > * { direction: ltr; }

.nc-col-visual {
  aspect-ratio: 4/3;
  border-radius: 20px;
  border: 1px solid rgba(139, 92, 246, 0.25);
  overflow: hidden;
  position: relative;
  background: linear-gradient(135deg, #150a30, #0a1a40);
  box-shadow: 0 20px 60px rgba(0,0,0,0.4);
}
.nc-col-visual-inner {
  position: absolute;
  inset: 0;
  display: flex;
  align-items: center;
  justify-content: center;
}
.nc-visual-icon {
  font-size: 80px;
  opacity: 0.8;
  animation: nc-char-float 3s ease-in-out infinite;
}

.nc-col-text .nc-tag {
  display: inline-block;
  font-size: 11px;
  letter-spacing: 0.3em;
  color: #c084fc;
  border: 1px solid rgba(192,132,252,0.4);
  padding: 4px 14px;
  border-radius: 20px;
  margin-bottom: 20px;
}
.nc-col-text h2 {
  font-size: clamp(24px, 4vw, 38px);
  font-weight: 800;
  margin-bottom: 20px;
  line-height: 1.3;
}
.nc-col-text p {
  font-size: 15px;
  color: rgba(200,200,255,0.7);
  line-height: 1.9;
}

/* ===== 開発状況バナー ===== */
.nc-status {
  padding: 60px 20px;
  text-align: center;
  background: linear-gradient(135deg, rgba(30,10,70,0.6), rgba(10,20,60,0.6));
  border-top: 1px solid rgba(139,92,246,0.15);
  border-bottom: 1px solid rgba(139,92,246,0.15);
}
.nc-status-badge {
  display: inline-block;
  background: linear-gradient(135deg, #7c3aed, #2563eb);
  color: #fff;
  font-size: 12px;
  font-weight: 700;
  letter-spacing: 0.3em;
  padding: 6px 20px;
  border-radius: 20px;
  margin-bottom: 24px;
}
.nc-status h2 {
  font-size: clamp(22px, 4vw, 36px);
  font-weight: 800;
  margin-bottom: 16px;
}
.nc-status p {
  color: rgba(200,200,255,0.7);
  font-size: 15px;
  line-height: 1.8;
  max-width: 500px;
  margin: 0 auto 32px;
}

/* ===== フッター ===== */
.nc-footer {
  padding: 40px 20px;
  text-align: center;
  color: rgba(200,200,255,0.3);
  font-size: 13px;
  background: #03030a;
}

/* ===== レスポンシブ ===== */
@media (max-width: 768px) {
  .nc-two-col-inner,
  .nc-two-col-inner.nc-reverse {
    grid-template-columns: 1fr;
    direction: ltr;
  }
}
</style>

<div class="nc-page">

  <!-- ===== ヒーローセクション ===== -->
  <section class="nc-hero">
    <!-- 星 -->
    <div class="nc-stars" id="nc-stars"></div>

    <div class="nc-logo-wrapper">
      <div class="nc-logo-title">NovelCraft</div>
      <div class="nc-logo-sub">ノベクラ</div>
    </div>

    <div class="nc-hero-catch">
      あなたの<span>物語</span>を、<br>
      もっと<span>自由</span>に。
    </div>

    <p class="nc-hero-desc">
      NovelCraftは、ビジュアルノベルを<strong>プレイする</strong>喜びと<br>
      <strong>つくる</strong>楽しさを、ひとつのプラットフォームで。
    </p>

    <div class="nc-hero-buttons">
      <a href="#features" class="nc-btn nc-btn-primary">特徴を見る</a>
      <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="nc-btn nc-btn-secondary">開発日記を読む</a>
    </div>

    <div class="nc-scroll-hint">SCROLL</div>
  </section>

  <!-- ===== デモ風ウィンドウ ===== -->
  <section class="nc-demo-section">
    <div class="nc-demo-wrapper">
      <p class="nc-demo-label">— NOVEL WINDOW —</p>
      <div class="nc-demo-screen">
        <div class="nc-demo-bg-deco"></div>
        <div class="nc-demo-character"></div>
        <div class="nc-demo-window">
          <div class="nc-demo-name" id="nc-demo-name">???</div>
          <div class="nc-demo-text" id="nc-demo-text">
            <span id="nc-demo-content">ここは、物語が生まれる場所。</span><span class="nc-demo-cursor"></span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== 特徴セクション ===== -->
  <section class="nc-features" id="features">
    <div class="nc-section-title"><h2>NovelCraftの特徴</h2></div>
    <p class="nc-section-lead">ビジュアルノベルの「再生」と「制作」を一体化したプラットフォーム</p>

    <div class="nc-features-grid">
      <div class="nc-feature-card" style="--card-color: #c084fc;">
        <span class="nc-feature-icon">📖</span>
        <h3>リッチなノベル体験</h3>
        <p>キャラクターの立ち絵・背景・選択肢が連動したビジュアルノベルをお楽しみいただけます。テキスト速度やスキップも細かく設定可能です。</p>
      </div>

      <div class="nc-feature-card" style="--card-color: #818cf8;">
        <span class="nc-feature-icon">✍️</span>
        <h3>ノベル制作エディタ</h3>
        <p>Craftモードで自分だけのノベルを制作。Undo/Redoに対応した直感的な編集環境で、コーディング不要でシナリオを組み立てられます。</p>
      </div>

      <div class="nc-feature-card" style="--card-color: #38bdf8;">
        <span class="nc-feature-icon">💬</span>
        <h3>豊かなテキスト表現</h3>
        <p>色・サイズ変更、ルビ（振り仮名）など多彩なテキスト装飾に対応。セリフに感情と個性を込められます。</p>
      </div>

      <div class="nc-feature-card" style="--card-color: #f472b6;">
        <span class="nc-feature-icon">🎭</span>
        <h3>キャラクター演出</h3>
        <p>複数の衣装・表情をもつキャラクターが画面に登場。発話中のキャラクターをハイライト表示し、臨場感のある演出を実現。</p>
      </div>

      <div class="nc-feature-card" style="--card-color: #34d399;">
        <span class="nc-feature-icon">🔀</span>
        <h3>選択肢と分岐シナリオ</h3>
        <p>プレイヤーの選択によって物語が分岐。あなたの決断が物語を動かします。変数システムにより複雑な分岐も実現予定。</p>
      </div>

      <div class="nc-feature-card" style="--card-color: #fbbf24;">
        <span class="nc-feature-icon">💾</span>
        <h3>セーブ＆ロード</h3>
        <p>複数のセーブスロットに対応。好きなところから再開でき、何度でも物語を追体験できます。</p>
      </div>
    </div>
  </section>

  <!-- ===== Playセクション ===== -->
  <section class="nc-two-col">
    <div class="nc-two-col-inner">
      <div class="nc-col-visual">
        <div class="nc-col-visual-inner">
          <span class="nc-visual-icon">🎮</span>
        </div>
      </div>
      <div class="nc-col-text">
        <span class="nc-tag">PLAY MODE</span>
        <h2>物語の世界に<br>没入しよう</h2>
        <p>こだわり抜いた演出と美しいビジュアルで紡がれるノベルを、NovelCraftのプレイヤーでお楽しみください。テキスト速度や文字サイズなど、あなたに合わせた設定で最高の読書体験を。</p>
      </div>
    </div>
  </section>

  <section class="nc-two-col" style="background: #05050f;">
    <div class="nc-two-col-inner nc-reverse">
      <div class="nc-col-visual">
        <div class="nc-col-visual-inner">
          <span class="nc-visual-icon">🛠️</span>
        </div>
      </div>
      <div class="nc-col-text">
        <span class="nc-tag">CRAFT MODE</span>
        <h2>あなたの物語を<br>カタチにしよう</h2>
        <p>Craftモードでは、キャラクター・背景・セリフ・選択肢をGUI上で自由に組み合わせてノベルを制作できます。プログラミングの知識は不要。アイデアをそのまま形にしてください。</p>
      </div>
    </div>
  </section>

  <!-- ===== 開発状況 ===== -->
  <section class="nc-status">
    <div class="nc-status-badge">NOW IN DEVELOPMENT</div>
    <h2>現在、鋭意開発中！</h2>
    <p>NovelCraftは現在開発中です。開発の進捗や新機能の情報は開発日記でお知らせしています。ぜひチェックしてください。</p>
    <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="nc-btn nc-btn-primary">開発日記を読む →</a>
  </section>

  <!-- ===== フッター ===== -->
  <footer class="nc-footer">
    <p>&copy; <?php echo date('Y'); ?> NovelCraft. All rights reserved.</p>
  </footer>

</div><!-- /.nc-page -->

<script>
// 星を生成
(function() {
  var container = document.getElementById('nc-stars');
  if (!container) return;
  for (var i = 0; i < 80; i++) {
    var star = document.createElement('div');
    star.className = 'nc-star';
    var size = Math.random() * 2.5 + 0.5;
    star.style.cssText = [
      'width:' + size + 'px',
      'height:' + size + 'px',
      'top:' + Math.random() * 100 + '%',
      'left:' + Math.random() * 100 + '%',
      '--dur:' + (Math.random() * 4 + 2) + 's',
      '--delay:-' + (Math.random() * 6) + 's',
      '--op:' + (Math.random() * 0.6 + 0.2)
    ].join(';');
    container.appendChild(star);
  }
})();

// デモテキストのタイプライター
(function() {
  var scenes = [
    { name: 'システム', text: 'ここは、物語が生まれる場所。' },
    { name: 'ナレーター', text: '世界の命運は、あなたの選択にかかっている――' },
    { name: 'ユイ', text: '待ってたよ。ずっと、あなたのことを。' },
    { name: 'システム', text: '▼ どうする？' },
  ];
  var nameEl = document.getElementById('nc-demo-name');
  var textEl = document.getElementById('nc-demo-content');
  if (!nameEl || !textEl) return;

  var si = 0, ci = 0, typing = true;
  function tick() {
    var scene = scenes[si];
    nameEl.textContent = scene.name;
    if (typing) {
      textEl.textContent = scene.text.slice(0, ci);
      ci++;
      if (ci > scene.text.length) {
        typing = false;
        setTimeout(tick, 2000);
        return;
      }
      setTimeout(tick, 80);
    } else {
      ci = 0;
      typing = true;
      si = (si + 1) % scenes.length;
      setTimeout(tick, 300);
    }
  }
  setTimeout(tick, 800);
})();

// スムーズスクロール
document.querySelectorAll('a[href^="#"]').forEach(function(a) {
  a.addEventListener('click', function(e) {
    var target = document.querySelector(this.getAttribute('href'));
    if (target) {
      e.preventDefault();
      target.scrollIntoView({ behavior: 'smooth' });
    }
  });
});
</script>

<?php get_footer(); ?>
