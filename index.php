<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Выживаемость бизнеса по годам</title>
  <meta name="description" content="Статистика выживания компаний и ИП в России: кривая выживаемости по годам жизни и возрастная структура рынка." />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,700&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <style>
    :root {
      --ink: #0f1c17;
      --ink-soft: #1a2e26;
      --foam: #e8f2ec;
      --mist: #b7cfc2;
      --leaf: #3d8b6e;
      --leaf-bright: #5cb892;
      --copper: #c47a3a;
      --copper-soft: #e0a56a;
      --danger: #c45a4a;
      --line: rgba(232, 242, 236, 0.12);
      --glow: rgba(92, 184, 146, 0.18);
      --font-display: "Fraunces", Georgia, serif;
      --font-body: "Manrope", sans-serif;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }

    html { scroll-behavior: smooth; }

    body {
      font-family: var(--font-body);
      color: var(--foam);
      background: var(--ink);
      line-height: 1.55;
      overflow-x: hidden;
    }

    a { color: var(--leaf-bright); text-underline-offset: 3px; }

    .atmosphere {
      position: fixed;
      inset: 0;
      z-index: -1;
      background:
        radial-gradient(ellipse 80% 50% at 15% -10%, rgba(61, 139, 110, 0.35), transparent 55%),
        radial-gradient(ellipse 60% 45% at 90% 10%, rgba(196, 122, 58, 0.22), transparent 50%),
        radial-gradient(ellipse 70% 50% at 50% 100%, rgba(15, 40, 32, 0.9), transparent 60%),
        linear-gradient(165deg, #0b1511 0%, #13241d 45%, #0f1c17 100%);
    }

    .atmosphere::after {
      content: "";
      position: absolute;
      inset: 0;
      opacity: 0.35;
      background-image:
        repeating-linear-gradient(
          -18deg,
          transparent,
          transparent 46px,
          rgba(232, 242, 236, 0.015) 46px,
          rgba(232, 242, 236, 0.015) 47px
        );
      pointer-events: none;
    }

    .wrap {
      width: min(1120px, calc(100% - 2rem));
      margin-inline: auto;
    }

    /* ——— Hero ——— */
    .hero {
      min-height: 100svh;
      display: grid;
      align-content: end;
      padding: 2rem 0 4.5rem;
      position: relative;
    }

    .hero::before {
      content: "";
      position: absolute;
      right: -8%;
      top: 8%;
      width: min(52vw, 560px);
      height: min(52vw, 560px);
      border-radius: 50%;
      background:
        radial-gradient(circle at 40% 40%, rgba(92, 184, 146, 0.28), transparent 55%),
        radial-gradient(circle at 70% 70%, rgba(196, 122, 58, 0.2), transparent 50%);
      filter: blur(8px);
      animation: drift 14s ease-in-out infinite alternate;
      pointer-events: none;
    }

    @keyframes drift {
      from { transform: translate(0, 0) scale(1); }
      to { transform: translate(-4%, 6%) scale(1.08); }
    }

    .brand {
      font-family: var(--font-display);
      font-size: clamp(3.2rem, 9vw, 6.5rem);
      font-weight: 700;
      letter-spacing: -0.03em;
      line-height: 0.95;
      max-width: 12ch;
      opacity: 0;
      animation: rise 0.9s ease forwards 0.1s;
    }

    .brand span {
      display: block;
      color: var(--leaf-bright);
    }

    .hero-lead {
      margin-top: 1.4rem;
      max-width: 34rem;
      font-size: clamp(1.05rem, 2.2vw, 1.25rem);
      color: var(--mist);
      opacity: 0;
      animation: rise 0.9s ease forwards 0.35s;
    }

    .hero-cta {
      margin-top: 2rem;
      display: flex;
      flex-wrap: wrap;
      gap: 0.85rem;
      opacity: 0;
      animation: rise 0.9s ease forwards 0.55s;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.85rem 1.35rem;
      border-radius: 999px;
      font-weight: 600;
      font-size: 0.95rem;
      text-decoration: none;
      transition: transform 0.2s ease, background 0.2s ease, color 0.2s ease;
    }

    .btn:hover { transform: translateY(-2px); }

    .btn-primary {
      background: var(--leaf-bright);
      color: var(--ink);
    }

    .btn-ghost {
      border: 1px solid var(--line);
      color: var(--foam);
      background: rgba(232, 242, 236, 0.04);
    }

    @keyframes rise {
      from { opacity: 0; transform: translateY(18px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* ——— Sections ——— */
    section {
      padding: 5rem 0;
      border-top: 1px solid var(--line);
    }

    .section-label {
      font-size: 0.8rem;
      letter-spacing: 0.14em;
      text-transform: uppercase;
      color: var(--copper-soft);
      font-weight: 600;
      margin-bottom: 0.75rem;
    }

    h2 {
      font-family: var(--font-display);
      font-size: clamp(2rem, 4.5vw, 3rem);
      font-weight: 700;
      letter-spacing: -0.02em;
      line-height: 1.1;
      max-width: 18ch;
      margin-bottom: 0.85rem;
    }

    .section-lead {
      color: var(--mist);
      max-width: 38rem;
      margin-bottom: 2.5rem;
      font-size: 1.05rem;
    }

    /* ——— Chart ——— */
    .chart-panel {
      background: linear-gradient(160deg, rgba(26, 46, 38, 0.85), rgba(15, 28, 23, 0.6));
      border: 1px solid var(--line);
      border-radius: 1.25rem;
      padding: clamp(1.25rem, 3vw, 2rem);
      box-shadow: 0 0 0 1px rgba(92, 184, 146, 0.05), 0 30px 80px rgba(0, 0, 0, 0.25);
    }

    .chart-head {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      gap: 1rem;
      margin-bottom: 1.5rem;
      align-items: end;
    }

    .chart-head h3 {
      font-family: var(--font-display);
      font-size: 1.45rem;
      font-weight: 600;
    }

    .chart-note {
      color: var(--mist);
      font-size: 0.88rem;
      max-width: 28rem;
    }

    .chart-wrap {
      position: relative;
      width: 100%;
      height: clamp(280px, 42vw, 420px);
    }

    canvas { width: 100% !important; height: 100% !important; }

    .year-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
      gap: 1rem;
      margin-top: 1.75rem;
    }

    .year-stat {
      padding: 1.1rem 1rem 1.15rem;
      border-top: 2px solid var(--leaf);
      background: rgba(232, 242, 236, 0.03);
      opacity: 0;
      transform: translateY(12px);
      transition: opacity 0.5s ease, transform 0.5s ease;
    }

    .year-stat.visible {
      opacity: 1;
      transform: translateY(0);
    }

    .year-stat .y {
      font-size: 0.78rem;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      color: var(--mist);
      margin-bottom: 0.35rem;
    }

    .year-stat .v {
      font-family: var(--font-display);
      font-size: 2rem;
      font-weight: 700;
      letter-spacing: -0.02em;
      color: var(--foam);
    }

    .year-stat .d {
      margin-top: 0.35rem;
      font-size: 0.82rem;
      color: var(--mist);
    }

    /* ——— Thresholds ——— */
    .thresholds {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1.25rem;
    }

    @media (max-width: 800px) {
      .thresholds { grid-template-columns: 1fr; }
    }

    .threshold {
      padding: 1.5rem 0 0;
      border-top: 1px solid var(--line);
    }

    .threshold .num {
      font-family: var(--font-display);
      font-size: clamp(2.4rem, 5vw, 3.4rem);
      font-weight: 700;
      letter-spacing: -0.03em;
      line-height: 1;
      color: var(--copper-soft);
      margin-bottom: 0.65rem;
    }

    .threshold h3 {
      font-size: 1.1rem;
      font-weight: 600;
      margin-bottom: 0.45rem;
    }

    .threshold p {
      color: var(--mist);
      font-size: 0.95rem;
    }

    /* ——— Age structure ——— */
    .bars {
      display: grid;
      gap: 1.1rem;
    }

    .bar-row {
      display: grid;
      grid-template-columns: minmax(7rem, 9rem) 1fr auto;
      gap: 1rem;
      align-items: center;
    }

    @media (max-width: 560px) {
      .bar-row {
        grid-template-columns: 1fr auto;
        grid-template-rows: auto auto;
      }
      .bar-row .label { grid-column: 1 / -1; }
    }

    .bar-row .label {
      font-size: 0.92rem;
      color: var(--mist);
    }

    .track {
      height: 1.15rem;
      background: rgba(232, 242, 236, 0.06);
      border-radius: 999px;
      overflow: hidden;
    }

    .fill {
      height: 100%;
      width: 0;
      border-radius: inherit;
      background: linear-gradient(90deg, var(--leaf), var(--leaf-bright));
      transition: width 1.1s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .fill.copper {
      background: linear-gradient(90deg, #9a5a28, var(--copper-soft));
    }

    .pct {
      font-family: var(--font-display);
      font-weight: 700;
      font-size: 1.15rem;
      min-width: 3.5rem;
      text-align: right;
    }

    /* ——— Cohorts ——— */
    .cohort-table {
      width: 100%;
      border-collapse: collapse;
      font-size: 0.95rem;
    }

    .cohort-table th,
    .cohort-table td {
      text-align: left;
      padding: 1rem 0.75rem;
      border-bottom: 1px solid var(--line);
    }

    .cohort-table th {
      color: var(--mist);
      font-weight: 500;
      font-size: 0.8rem;
      letter-spacing: 0.06em;
      text-transform: uppercase;
    }

    .cohort-table td:last-child,
    .cohort-table th:last-child {
      text-align: right;
      font-family: var(--font-display);
      font-size: 1.15rem;
      font-weight: 700;
    }

    .cohort-table tbody tr {
      transition: background 0.2s ease;
    }

    .cohort-table tbody tr:hover {
      background: rgba(92, 184, 146, 0.06);
    }

    /* ——— Sources ——— */
    .sources {
      color: var(--mist);
      font-size: 0.9rem;
    }

    .sources ul {
      list-style: none;
      display: grid;
      gap: 0.65rem;
      margin-top: 1.25rem;
    }

    .sources li {
      padding-left: 1rem;
      border-left: 2px solid var(--leaf);
    }

    footer {
      padding: 2.5rem 0 3.5rem;
      border-top: 1px solid var(--line);
      color: var(--mist);
      font-size: 0.85rem;
    }

    .reveal {
      opacity: 0;
      transform: translateY(24px);
      transition: opacity 0.7s ease, transform 0.7s ease;
    }

    .reveal.visible {
      opacity: 1;
      transform: translateY(0);
    }
  </style>
</head>
<body>
  <div class="atmosphere" aria-hidden="true"></div>

  <header class="hero wrap">
    <p class="brand">Выживаемость<span>бизнеса</span></p>
    <p class="hero-lead">
      Сколько компаний остаётся на рынке через 1, 3, 5 и 10 лет —
      сводная картина по открытым данным МСП, Росстата и аналитики банков.
    </p>
    <div class="hero-cta">
      <a class="btn btn-primary" href="#curve">Смотреть кривую</a>
      <a class="btn btn-ghost" href="#age">Возраст рынка</a>
    </div>
  </header>

  <main>
    <section id="curve">
      <div class="wrap">
        <p class="section-label">Кривая выживаемости</p>
        <h2>Доля компаний, доживших до N-го года</h2>
        <p class="section-lead">
          Оценки для российских юрлиц и ИП. Первые два-три года — самый жёсткий отсев;
          к пятому году на рынке остаётся примерно каждый третий бизнес.
        </p>

        <div class="chart-panel reveal">
          <div class="chart-head">
            <h3>Выживаемость по годам жизни</h3>
            <p class="chart-note">
              Консолидированная оценка на основе исследований МСП 2017–2025 гг.
              Фактические значения зависят от когорты и отрасли.
            </p>
          </div>
          <div class="chart-wrap">
            <canvas id="survivalChart" aria-label="График выживаемости бизнеса по годам"></canvas>
          </div>

          <div class="year-grid" id="yearStats">
            <div class="year-stat" data-delay="0">
              <div class="y">1 год</div>
              <div class="v">88%</div>
              <div class="d">Первый фильтр рынка</div>
            </div>
            <div class="year-stat" data-delay="1">
              <div class="y">2 года</div>
              <div class="v">67%</div>
              <div class="d">~⅓ закрывается раньше</div>
            </div>
            <div class="year-stat" data-delay="2">
              <div class="y">3 года</div>
              <div class="v">52%</div>
              <div class="d">Критический порог</div>
            </div>
            <div class="year-stat" data-delay="3">
              <div class="y">5 лет</div>
              <div class="v">29–42%</div>
              <div class="d">Зависит от когорты</div>
            </div>
            <div class="year-stat" data-delay="4">
              <div class="y">7 лет</div>
              <div class="v">~22%</div>
              <div class="d">Около среднего срока жизни</div>
            </div>
            <div class="year-stat" data-delay="5">
              <div class="y">10 лет</div>
              <div class="v">~15%</div>
              <div class="d">Долгожители рынка</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="thresholds">
      <div class="wrap">
        <p class="section-label">Пороги риска</p>
        <h2>Три волны отсева</h2>
        <p class="section-lead">
          Средний срок жизни компании в России — около 6–7 лет.
          Но путь до этого возраста проходит через несколько резких спадов.
        </p>
        <div class="thresholds reveal">
          <article class="threshold">
            <div class="num">−30%</div>
            <h3>Годы 1–3</h3>
            <p>Первая волна: около трети новых бизнесов не переживает стартовый этап.</p>
          </article>
          <article class="threshold">
            <div class="num">−40%</div>
            <h3>Годы 3–5</h3>
            <p>Из оставшихся после третьего года ещё ~40% уходит к пятому году.</p>
          </article>
          <article class="threshold">
            <div class="num">29%</div>
            <h3>До 5-го года</h3>
            <p>Лишь около 29% компаний доживают до пяти лет (оценки по данным Росстата / отраслевым исследованиям).</p>
          </article>
        </div>
      </div>
    </section>

    <section id="cohorts">
      <div class="wrap">
        <p class="section-label">По годам основания</p>
        <h2>Выживаемость когорт</h2>
        <p class="section-lead">
          Пятилетняя (или близкая к ней) выживаемость заметно отличается
          в зависимости от года запуска бизнеса.
        </p>
        <div class="chart-panel reveal">
          <table class="cohort-table">
            <thead>
              <tr>
                <th>Год открытия</th>
                <th>Горизонт</th>
                <th>Остались на рынке</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>2016</td>
                <td>5 лет</td>
                <td>24,5%</td>
              </tr>
              <tr>
                <td>2019–2020</td>
                <td>5 лет</td>
                <td>~34%</td>
              </tr>
              <tr>
                <td>2020</td>
                <td>5 лет (к концу 2025)</td>
                <td>42%</td>
              </tr>
              <tr>
                <td>2022</td>
                <td>~3 года (к концу 2025)</td>
                <td>50%</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>

    <section id="age">
      <div class="wrap">
        <p class="section-label">Срез рынка · июнь 2026</p>
        <h2>Возраст действующих бизнесов</h2>
        <p class="section-lead">
          Не когортная выживаемость, а структура текущего рынка:
          сколько сегодняшних ЮЛ и ИП имеют тот или иной срок жизни.
          По данным Контур.Фокус — 8,1 млн субъектов.
        </p>
        <div class="bars reveal" id="ageBars">
          <div class="bar-row">
            <div class="label">до 2 лет</div>
            <div class="track"><div class="fill" data-width="24.89"></div></div>
            <div class="pct">24,9%</div>
          </div>
          <div class="bar-row">
            <div class="label">от 2 до 5 лет</div>
            <div class="track"><div class="fill" data-width="21.92"></div></div>
            <div class="pct">21,9%</div>
          </div>
          <div class="bar-row">
            <div class="label">от 5 до 10 лет</div>
            <div class="track"><div class="fill" data-width="21.06"></div></div>
            <div class="pct">21,1%</div>
          </div>
          <div class="bar-row">
            <div class="label">10 лет и более</div>
            <div class="track"><div class="fill copper" data-width="32.13"></div></div>
            <div class="pct">32,1%</div>
          </div>
        </div>
      </div>
    </section>

    <section id="sources">
      <div class="wrap sources">
        <p class="section-label">Источники</p>
        <h2>Откуда цифры</h2>
        <ul>
          <li>МГУ / реестр МСП 2017–2023: около трети компаний закрывается в возрасте до 2 лет; до 5–7 лет доходит менее 30%.</li>
          <li>Отраслевые сводки по данным Росстата: ~29% доживают до 5 лет; средний срок жизни 6–7 лет.</li>
          <li>«Точка»: 50% открытых в 2022 остаются к концу 2025; 42% открытых в 2020 — через пять лет.</li>
          <li>Контур.Фокус (июнь 2026): возрастная структура 8,1 млн ЮЛ и ИП.</li>
        </ul>
      </div>
    </section>
  </main>

  <footer>
    <div class="wrap">
      Сводка носит иллюстративный характер: методики учёта закрытия (ликвидация, исключение ФНС, «спящие» компании) различаются между источниками.
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js"></script>
  <script>
    const years = [0, 1, 2, 3, 5, 7, 10];
    const survival = [100, 88, 67, 52, 35, 22, 15];

    const ctx = document.getElementById("survivalChart");
    const gradient = ctx.getContext("2d").createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, "rgba(92, 184, 146, 0.35)");
    gradient.addColorStop(1, "rgba(92, 184, 146, 0)");

    let chartDrawn = false;

    function drawChart() {
      if (chartDrawn) return;
      chartDrawn = true;

      new Chart(ctx, {
        type: "line",
        data: {
          labels: years.map((y) => (y === 0 ? "Старт" : y + " лет")),
          datasets: [{
            label: "Выживаемость, %",
            data: survival,
            borderColor: "#5cb892",
            backgroundColor: gradient,
            borderWidth: 3,
            pointRadius: 5,
            pointHoverRadius: 7,
            pointBackgroundColor: "#e8f2ec",
            pointBorderColor: "#5cb892",
            pointBorderWidth: 2,
            fill: true,
            tension: 0.35,
          }],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          animation: { duration: 1400, easing: "easeOutQuart" },
          plugins: {
            legend: { display: false },
            tooltip: {
              backgroundColor: "#1a2e26",
              titleColor: "#e8f2ec",
              bodyColor: "#b7cfc2",
              borderColor: "rgba(232,242,236,0.12)",
              borderWidth: 1,
              padding: 12,
              displayColors: false,
              callbacks: {
                label: (item) => item.parsed.y + "% компаний остаётся на рынке",
              },
            },
          },
          scales: {
            x: {
              grid: { color: "rgba(232,242,236,0.06)" },
              ticks: { color: "#b7cfc2", font: { family: "Manrope", size: 12 } },
            },
            y: {
              min: 0,
              max: 100,
              grid: { color: "rgba(232,242,236,0.06)" },
              ticks: {
                color: "#b7cfc2",
                font: { family: "Manrope", size: 12 },
                callback: (v) => v + "%",
              },
            },
          },
        },
      });
    }

    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;
          entry.target.classList.add("visible");

          if (entry.target.classList.contains("chart-panel") && entry.target.querySelector("#survivalChart")) {
            drawChart();
            document.querySelectorAll(".year-stat").forEach((el, i) => {
              setTimeout(() => el.classList.add("visible"), 120 * i);
            });
          }

          if (entry.target.id === "ageBars") {
            entry.target.querySelectorAll(".fill").forEach((fill) => {
              fill.style.width = fill.dataset.width + "%";
            });
          }
        });
      },
      { threshold: 0.2 }
    );

    document.querySelectorAll(".reveal, #ageBars").forEach((el) => io.observe(el));
  </script>
</body>
</html>
