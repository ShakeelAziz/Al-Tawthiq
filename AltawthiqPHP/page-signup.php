<?php /* Template Name: Signup */ ?>
  <style>
    :root {
      --bg: #ffffff;
      --card: #ffffff;
      --text: #1f2937;
      --muted: #6b7280;
      --line: #e5e7eb;
      --primary: #b135f3;
      --primary-dark: #9516c4;
      --btn-brand-start: #b135f3;
      --btn-brand-end: #bb46e5;
      --btn-brand-solid: #b135f3;
      --btn-brand-shadow: 0 8px 18px rgba(177, 53, 243, 0.32);
      --btn-brand-shadow-hover: 0 14px 28px rgba(177, 53, 243, 0.38);
      --primary-soft: #f7eef9;
      --success: #047857;
      --soft-gray: #f8f8fa;
    }

    * { box-sizing: border-box; }

    body {
      margin: 0;
      font-family: "Segoe UI", Tahoma, Arial, sans-serif;
      background: var(--bg);
      color: var(--text);
      min-height: 100vh;
    }

    .topbar {
      width: 100%;
      background: #442045;
      color: #fff;
      height: 46px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 16px;
      font-weight: 700;
      letter-spacing: 0.4px;
      font-size: 18px;
    }

    .topbar-logo {
      height: 30px;
      width: auto;
      display: block;
    }

    .lang-btn {
      border: 1px solid rgba(255, 255, 255, 0.35);
      background: transparent;
      color: #fff;
      border-radius: 6px;
      padding: 6px 10px;
      font-size: 12px;
      cursor: pointer;
      display: inline-block;
    }

    html[dir="rtl"] body {
      direction: rtl;
    }

    html[dir="rtl"] .title-row {
      flex-direction: row-reverse;
    }

    .layout {
      width: 100%;
      max-width: 1100px;
      margin: 20px auto;
      padding: 0 16px;
    }

    .timeline {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 10px;
      margin-top: 14px;
      padding: 8px 0 14px;
      border-bottom: 1px solid #ececf0;
    }

    .timeline-item {
      display: flex;
      align-items: center;
      gap: 7px;
      color: #6b7280;
      font-size: 13px;
      font-weight: 600;
      text-align: center;
      padding: 2px 0;
      white-space: nowrap;
    }

    .timeline-dot {
      width: 20px;
      height: 20px;
      border-radius: 50%;
      border: 2px solid #d1d5db;
      background: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 10px;
      color: #6b7280;
    }

    .timeline-item.active {
      color: var(--primary);
    }

    .timeline-item.active .timeline-dot {
      border-color: var(--primary);
      background: var(--primary);
      color: #fff;
    }

    .timeline-item.done .timeline-dot {
      border-color: var(--primary);
      background: #f3e8f7;
      color: #4a1757;
    }

    .main-panel {
      border: 1px solid var(--line);
      background: #fff;
      min-height: 540px;
      display: flex;
      flex-direction: column;
    }

    .panel-inner {
      padding: 30px 34px;
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    .title-row {
      display: flex;
      justify-content: space-between;
      align-items: start;
      gap: 16px;
      margin-bottom: 8px;
    }

    .title {
      margin: 0;
      font-size: 38px;
      font-weight: 700;
      line-height: 1.05;
    }

    .subtitle {
      margin: 10px 0 0;
      color: var(--muted);
      font-size: 14px;
      max-width: 700px;
      line-height: 1.5;
    }

    .step-badge {
      background: var(--primary-soft);
      color: var(--primary);
      border: 1px solid #e8d3ef;
      padding: 6px 10px;
      border-radius: 8px;
      font-size: 12px;
      font-weight: 600;
      white-space: nowrap;
    }

    .progress-track {
      width: 100%;
      height: 6px;
      border-radius: 99px;
      background: #ececf0;
      overflow: hidden;
      margin-top: 14px;
    }

    .progress-fill {
      height: 100%;
      width: 0%;
      background: linear-gradient(90deg, var(--primary), #b04dc6);
      transition: width 0.25s ease;
    }

    .question {
      margin: 26px 0 8px;
      font-size: 30px;
      font-weight: 700;
      line-height: 1.2;
    }

    .helper {
      margin: 0 0 18px;
      color: var(--muted);
      font-size: 15px;
    }

    .error {
      margin-top: 14px;
      color: #b91c1c;
      background: #fef2f2;
      border: 1px solid #fecaca;
      border-radius: 10px;
      padding: 10px;
      font-size: 13px;
      display: none;
    }

    .options {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 10px;
      margin-top: 8px;
    }

    .option-card {
      border: 1px solid #d1d5db;
      border-radius: 6px;
      background: #fff;
      transition: all 0.18s ease;
      min-height: 54px;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 10px;
      cursor: pointer;
      user-select: none;
      font-size: 14px;
      font-weight: 600;
      color: #1f2937;
    }

    .option-card:hover {
      border-color: #b69ec2;
      box-shadow: 0 5px 14px rgba(124, 43, 143, 0.15);
      transform: translateY(-1px);
    }

    .option-card.active {
      border-color: var(--primary);
      background: var(--primary-soft);
      color: #4a1757;
    }

    .safe-box {
      margin-top: 18px;
      border: 1px solid #efd7f5;
      background: #fcf7fd;
      border-left: 4px solid var(--primary);
      border-radius: 4px;
      padding: 10px 12px;
      color: #4b5563;
      font-size: 13px;
      line-height: 1.5;
    }

    .actions {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: auto;
      gap: 10px;
      padding-top: 26px;
      border-top: 1px solid #ececf0;
    }

    .btn {
      border: 0;
      border-radius: 4px;
      padding: 11px 16px;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: 0.2s;
      text-transform: uppercase;
      letter-spacing: 0.4px;
    }

    .btn-secondary {
      background: #f9fafb;
      color: #374151;
      border: 1px solid #d1d5db;
    }

    .btn-secondary:hover { background: #e5e7eb; }

    .btn-primary {
      border: none;
      border-radius: 10px;
      background: linear-gradient(135deg, var(--btn-brand-start) 0%, var(--btn-brand-end) 100%);
      color: #fff;
      box-shadow: var(--btn-brand-shadow);
      transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
    }

    .btn-primary:hover {
      background: var(--btn-brand-solid);
      transform: translateY(-2px) scale(1.01);
      box-shadow: var(--btn-brand-shadow-hover);
    }

    .btn:disabled {
      opacity: 0.6;
      cursor: not-allowed;
    }

    .plans {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
      gap: 12px;
      margin-top: 12px;
    }

    .plan {
      border: 1px solid #dbe3ef;
      border-radius: 14px;
      padding: 14px;
      background: #fff;
    }

    .plan.recommended {
      border: 2px solid #60a5fa;
      background: #f8fbff;
    }

    .plan.selectable {
      cursor: pointer;
      transition: 0.18s ease;
    }

    .plan.selectable:hover {
      border-color: #c9a6d5;
      box-shadow: 0 8px 20px rgba(124, 43, 143, 0.12);
      transform: translateY(-1px);
    }

    .plan.selected {
      border: 2px solid var(--primary);
      background: #fcf7fd;
    }

    .plan.closed {
      opacity: 0.65;
      background: #f9fafb;
      border-color: #d1d5db;
      cursor: not-allowed;
    }

    .plan.closed .plan-duration {
      color: #6b7280;
    }

    .session-status {
      margin-top: 8px;
      font-size: 12px;
      font-weight: 700;
      color: #b91c1c;
      text-transform: uppercase;
    }

    .plan h3 {
      margin: 0 0 8px;
      font-size: 16px;
    }

    .plan-duration {
      color: var(--primary);
      font-size: 14px;
      font-weight: 700;
      margin-bottom: 8px;
    }

    .sessions-note {
      margin-top: 10px;
      color: #4b5563;
      font-size: 13px;
    }

    .plan p {
      margin: 0;
      color: #4b5563;
      font-size: 13px;
      line-height: 1.45;
    }

    .summary {
      margin-top: 12px;
      background: #fafafa;
      border: 1px solid #ececf0;
      border-radius: 6px;
      padding: 12px;
      font-size: 13px;
      color: #374151;
      line-height: 1.55;
    }

    .details-preview {
      margin: 8px 0 14px;
      background: #fafafa;
      border: 1px solid #ececf0;
      border-radius: 6px;
      padding: 10px 12px;
      font-size: 13px;
      color: #374151;
      line-height: 1.5;
    }

    .scheduler {
      margin-top: 12px;
      border: 1px solid #ececf0;
      border-radius: 8px;
      padding: 14px;
      background: #fff;
    }

    .scheduler label {
      display: block;
      font-size: 13px;
      font-weight: 600;
      color: #374151;
      margin-bottom: 6px;
    }

    .date-input {
      width: 100%;
      max-width: 260px;
      border: 1px solid #d1d5db;
      border-radius: 6px;
      padding: 9px 10px;
      font-size: 14px;
      margin-bottom: 12px;
    }

    .time-slots {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(110px, 1fr));
      gap: 8px;
      margin-bottom: 12px;
    }

    .time-slot {
      border: 1px solid #d1d5db;
      border-radius: 6px;
      background: #fff;
      padding: 9px 8px;
      font-size: 13px;
      font-weight: 600;
      cursor: pointer;
    }

    .time-slot.active {
      border-color: var(--primary);
      background: var(--primary-soft);
      color: #4a1757;
    }

    .calendar-btn {
      border: 0;
      border-radius: 10px;
      background: linear-gradient(135deg, var(--btn-brand-start) 0%, var(--btn-brand-end) 100%);
      color: #fff;
      padding: 10px 18px;
      font-size: 13px;
      font-weight: 700;
      cursor: pointer;
      box-shadow: var(--btn-brand-shadow);
      transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
    }

    .calendar-btn:hover {
      background: var(--btn-brand-solid);
      transform: translateY(-2px) scale(1.01);
      box-shadow: var(--btn-brand-shadow-hover);
    }

    .calendar-btn:disabled {
      opacity: 0.7;
      cursor: not-allowed;
    }

    .submit-status {
      margin-top: 10px;
      font-size: 13px;
      font-weight: 600;
    }

    .submit-status.success {
      color: #047857;
    }

    .submit-status.error {
      color: #b91c1c;
    }

    .confirm-note {
      margin-top: 12px;
      padding: 10px 12px;
      border: 1px solid #d1fae5;
      background: #ecfdf5;
      color: #065f46;
      border-radius: 6px;
      font-size: 13px;
      line-height: 1.5;
    }

    .close-form-btn {
      margin-top: 10px;
      border: 0;
      border-radius: 6px;
      background: #111827;
      color: #fff;
      padding: 10px 14px;
      font-size: 13px;
      font-weight: 600;
      cursor: pointer;
    }

    .close-form-btn:hover {
      background: #1f2937;
    }

    .contact-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 12px;
      margin-top: 12px;
    }

    .field {
      display: flex;
      flex-direction: column;
      gap: 6px;
    }

    .field label {
      font-size: 13px;
      font-weight: 600;
      color: #374151;
    }

    .text-input {
      width: 100%;
      border: 1px solid #d1d5db;
      border-radius: 6px;
      padding: 10px;
      font-size: 14px;
    }

    @media (max-width: 900px) {
      .timeline {
        flex-wrap: wrap;
        justify-content: flex-start;
        gap: 8px;
        padding-bottom: 12px;
      }

      .timeline-item {
        min-height: auto;
        font-size: 12px;
        background: #fafafa;
        border: 1px solid #ececf0;
        border-radius: 999px;
        padding: 5px 10px;
      }

      .panel-inner {
        padding: 20px;
      }

      .title {
        font-size: 28px;
      }

      .question {
        font-size: 24px;
      }
    }
  </style>
  <header class="topbar">
    <img
      class="topbar-logo"
      src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo_png.webp"
      alt="Altawthiq Logo">
    <button id="langToggle" class="lang-btn" type="button">AR</button>
  </header>

  <div class="layout">
    <main class="main-panel">
      <div class="panel-inner">
        <div class="title-row">
          <div>
            <h1 id="mainTitle" class="title">Tell us about your training needs</h1>
            <p id="mainSubtitle" class="subtitle">Answer one question at a time and we will suggest the most suitable plan for your team or personal growth.</p>
          </div>
          <span id="stepBadge" class="step-badge">Step 1 of 4</span>
        </div>
        <div class="progress-track" aria-hidden="true">
          <div id="progressFill" class="progress-fill"></div>
        </div>
        <div id="timeline" class="timeline"></div>

        <h2 id="question" class="question"></h2>
        <p id="helper" class="helper"></p>
        <div id="options" class="options"></div>
        <div id="error" class="error"></div>

        <div id="safeBox" class="safe-box">
          Your information is used only to recommend the right training path and follow up with the best-fit offer.
        </div>

        <div class="actions">
          <button id="backBtn" class="btn btn-secondary" type="button">Back</button>
          <button id="nextBtn" class="btn btn-primary" type="button">Next</button>
        </div>

        <div id="resultArea"></div>
      </div>
    </main>
  </div>

  <script>
    const i18n = {
      en: {
        mainTitle: "Tell us about your training needs",
        mainSubtitle: "Answer one question at a time and we will suggest the most suitable plan for your team or personal growth.",
        safeBox: "Your information is used only to recommend the right training path and follow up with the best-fit offer.",
        back: "Back",
        next: "Next",
        details: "Details",
        plans: "Plans",
        stepOf: (a, b) => `Step ${a} of ${b}`
      },
      ar: {
        mainTitle: "أخبرنا عن احتياجاتك التدريبية",
        mainSubtitle: "أجب عن سؤال واحد في كل خطوة وسنقترح عليك الخطة التدريبية الأنسب.",
        safeBox: "تُستخدم معلوماتك فقط لتوصية المسار التدريبي المناسب والمتابعة معك.",
        back: "السابق",
        next: "التالي",
        details: "البيانات",
        plans: "الخطط",
        stepOf: (a, b) => `الخطوة ${a} من ${b}`
      }
    };

    let currentLang = "ar";

    const steps = [
      {
        key: "sector",
        title: { en: "Sector", ar: "المجال" },
        question: { en: "Which sector do you want txraining in?", ar: "في أي مجال ترغب بالتدريب؟" },
        helper: { en: "You can select multiple sectors.", ar: "يمكنك اختيار أكثر من مجال." },
        options: [
          "IT",
          "Finance",
          "HR",
          "Marketing",
          "Project Management",
          "Operations",
          "Sales",
          "Engineering",
          "Design",
          "Healthcare",
          "Education",
          "Legal",
          "Occupational Health and Safety",
          "Security Guarding",
          "AI",
          "Microsoft Programs",
          "Media"
        ],
        multiple: true
      },
    
      {
        key: "companySize",
        title: { en: "Company Size", ar: "حجم الشركة" },
        question: { en: "What is the size of your company?", ar: "ما هو حجم شركتك؟" },
        helper: { en: "Choose one option.", ar: "اختر خيارا واحدا." },
        options: ["1-10", "11-50", "51-100", "101-500", "501-1000", "1001-5000", "5001-10000", "10001+"],
        multiple: false
      },
      {
        key: "experience",
        title: { en: "Experience", ar: "الخبرة" },
        question: { en: "What is your current experience level?", ar: "ما هو مستوى خبرتك الحالي؟" },
        helper: { en: "Choose one option.", ar: "اختر خيارا واحدا." },
        options: ["Beginner", "Intermediate", "Advanced", "Expert"],
        multiple: false
      },
      {
        key: "goals",
        title: { en: "Goals", ar: "الأهداف" },
        question: { en: "What are your primary goals?", ar: "ما هي أهدافك الأساسية؟" },
        helper: { en: "Select one or more goals.", ar: "اختر هدفا واحدا أو أكثر." },
        options: ["Career switch", "Promotion", "Certification", "Leadership", "Freelancing", "Other"],
        multiple: true
      },
      {
        key: "training_method",
        title: { en: "Training Method", ar: "طريقة التدريب" },
        question: { en: "Which training method do you prefer?", ar: "ما هي طريقة التدريب التي تفضلها؟" },
        helper: { en: "Choose one option.", ar: "اختر خيارا واحدا." },
        options: ["International", "Local-Onsite", "Online", "Recorded Videos"],
        multiple: false
      }
    //   {
    //     key: "plan_type",
    //     title: "Plan Type",
    //     question: "Which plan type do you prefer?",
    //     helper: "Choose one option.",
    //     options: ["Starter", "Professional", "Advanced"],
    //     multiple: true
    //   }
    ];

    const selections = {
      sector: [],
      companySize: "",
      experience: "",
      goals: [],
      training_method: "",
      sessions: [],
      fullName: "",
      email: "",
      phoneNumber: "",
      city: "",
      position: "",
      companyName: "",
      companyType: "",
      governmentField: "",
      organizationSector: "",
      organizationSectorOther: "",
      meetingDate: "",
      meetingTime: ""
    };

    const otherTextByStep = {};

    const valueLabels = {
      "IT": { ar: "تقنية المعلومات" },
      "Finance": { ar: "المالية" },
      "HR": { ar: "الموارد البشرية" },
      "Marketing": { ar: "التسويق" },
      "Project Management": { ar: "إدارة المشاريع" },
      "Operations": { ar: "العمليات" },
      "Sales": { ar: "المبيعات" },
      "Engineering": { ar: "الهندسة" },
      "Design": { ar: "التصميم" },
      "Healthcare": { ar: "الرعاية الصحية" },
      "Education": { ar: "التعليم" },
      "Legal": { ar: "القانوني" },
      "Occupational Health and Safety": { ar: "الصحة والسلامة المهنية" },
      "Security Guarding": { ar: "الحراسات الأمنية" },
      "AI": { ar: "الذكاء الاصطناعي" },
      "Microsoft Programs": { ar: "برامج مايكروسوفت" },
      "Media": { ar: "الإعلام" },
      "Beginner": { ar: "مبتدئ" },
      "Intermediate": { ar: "متوسط" },
      "Advanced": { ar: "متقدم" },
      "Expert": { ar: "خبير" },
      "Career switch": { ar: "تغيير المسار المهني" },
      "Promotion": { ar: "ترقية" },
      "Certification": { ar: "شهادة مهنية" },
      "Leadership": { ar: "قيادة" },
      "Freelancing": { ar: "العمل الحر" },
      "Other": { ar: "أخرى" },
      "International": { ar: "دولي" },
      "Local-Onsite": { ar: "محلي حضوري" },
      "Online": { ar: "عن بُعد" },
      "Recorded Videos": { ar: "فيديوهات مسجلة" },
      "Session 1": { ar: "الجلسة 1" },
      "Session 2": { ar: "الجلسة 2" },
      "Session 3": { ar: "الجلسة 3" },
      "Session 4": { ar: "الجلسة 4" },
      "Government": { ar: "حكومي" },
      "Private": { ar: "خاص" },
      "Non-profit": { ar: "غير ربحي" }
    };

    const questionEl = document.getElementById("question");
    const helperEl = document.getElementById("helper");
    const optionsEl = document.getElementById("options");
    const errorEl = document.getElementById("error");
    const backBtn = document.getElementById("backBtn");
    const nextBtn = document.getElementById("nextBtn");
    const progressFill = document.getElementById("progressFill");
    const stepBadge = document.getElementById("stepBadge");
    const resultArea = document.getElementById("resultArea");
    const timeline = document.getElementById("timeline");
    const mainTitleEl = document.getElementById("mainTitle");
    const mainSubtitleEl = document.getElementById("mainSubtitle");
    const safeBoxEl = document.getElementById("safeBox");
    const langToggle = document.getElementById("langToggle");

    // Configure these before going live.
    const WEBHOOK_URL = "https://altawthiqsa.app.n8n.cloud/webhook/lead-scheduled-call";

    let currentStep = 0;

    function tr(key) {
      return i18n[currentLang][key] || key;
    }

    function txt(v) {
      if (typeof v === "object" && v !== null) return v[currentLang] || v.en || "";
      return v;
    }

    function displayValue(value) {
      if (currentLang === "ar" && valueLabels[value] && valueLabels[value].ar) {
        return valueLabels[value].ar;
      }
      return value;
    }

    function applyLanguage() {
      document.documentElement.lang = currentLang === "ar" ? "ar" : "en";
      document.documentElement.dir = currentLang === "ar" ? "rtl" : "ltr";
      mainTitleEl.textContent = tr("mainTitle");
      mainSubtitleEl.textContent = tr("mainSubtitle");
      safeBoxEl.textContent = tr("safeBox");
      backBtn.textContent = tr("back");
      if (nextBtn.style.display !== "none") nextBtn.textContent = tr("next");
      langToggle.textContent = currentLang === "ar" ? "EN" : "AR";
      renderStep();
    }

    function renderTimeline() {
      timeline.innerHTML = "";
      const timelineSteps = [{ title: tr("details") }, ...steps, { title: tr("plans") }];
      const timelineActiveIndex = currentStep <= 1
        ? 0
        : Math.min(currentStep - 1, steps.length + 1);

      timelineSteps.forEach((step, index) => {
        const item = document.createElement("div");
        item.className = "timeline-item";
        if (index < timelineActiveIndex) item.classList.add("done");
        if (index === timelineActiveIndex) item.classList.add("active");
        item.innerHTML = `<span class="timeline-dot">${index + 1}</span><span>${txt(step.title)}</span>`;
        timeline.appendChild(item);
      });
    }

    function setError(text) {
      if (!text) {
        errorEl.style.display = "none";
        errorEl.textContent = "";
        return;
      }
      errorEl.textContent = text;
      errorEl.style.display = "block";
    }

    function readStepValue(step) {
      return selections[step.key];
    }

    function writeStepValue(step, value) {
      selections[step.key] = value;
    }

    function toggleChoice(step, option) {
      const value = readStepValue(step);

      if (!step.multiple) {
        writeStepValue(step, option);
        return;
      }

      const next = new Set(value);
      if (next.has(option)) next.delete(option);
      else next.add(option);
      writeStepValue(step, [...next]);
    }

    function isStepValid(step) {
      const value = readStepValue(step);
      if (step.multiple) {
        const valid = Array.isArray(value) && value.length > 0;
        if (!valid) return false;
        if (value.includes("Other")) {
          return !!(otherTextByStep[step.key] && otherTextByStep[step.key].trim());
        }
        return true;
      }
      const valid = typeof value === "string" && value.length > 0;
      if (!valid) return false;
      if (value === "Other") {
        return !!(otherTextByStep[step.key] && otherTextByStep[step.key].trim());
      }
      return true;
    }

    function renderOptions(step) {
      optionsEl.innerHTML = "";
      const value = readStepValue(step);
      const selectedSet = new Set(Array.isArray(value) ? value : [value]);

      step.options.forEach((option) => {
        const card = document.createElement("button");
        card.type = "button";
        card.className = "option-card";
        card.textContent = displayValue(option);
        if (selectedSet.has(option)) card.classList.add("active");

        card.addEventListener("click", () => {
          toggleChoice(step, option);
          setError("");
          renderOptions(step);
        });

        optionsEl.appendChild(card);
      });

      const hasOtherSelected = selectedSet.has("Other");
      if (hasOtherSelected) {
        const wrap = document.createElement("div");
        wrap.className = "field";
        wrap.style.gridColumn = "1 / -1";

        const label = document.createElement("label");
        label.setAttribute("for", `otherInput-${step.key}`);
        label.textContent = currentLang === "ar" ? "يرجى التحديد" : "Please specify";

        const input = document.createElement("input");
        input.id = `otherInput-${step.key}`;
        input.className = "text-input";
        input.type = "text";
        input.placeholder = currentLang === "ar" ? "أدخل التفاصيل" : "Enter details";
        input.value = otherTextByStep[step.key] || "";
        input.addEventListener("input", (e) => {
          otherTextByStep[step.key] = e.target.value;
        });

        wrap.appendChild(label);
        wrap.appendChild(input);
        optionsEl.appendChild(wrap);
      }
    }

    function updateProgress() {
      const totalScreens = steps.length + 5;
      const screenNumber = Math.min(currentStep + 1, totalScreens);
      const pct = (screenNumber / totalScreens) * 100;
      progressFill.style.width = pct + "%";
      stepBadge.textContent = i18n[currentLang].stepOf(screenNumber, totalScreens);
    }

    function renderStep() {
      resultArea.innerHTML = "";
      setError("");
      nextBtn.style.display = "inline-block";

      if (currentStep === 0) {
        renderContactDetails();
        return;
      }
      if (currentStep === 1) {
        renderCompanyDetails();
        return;
      }
      if (currentStep === steps.length + 2) {
        renderResult();
        return;
      }
      if (currentStep === steps.length + 3) {
        renderSchedule();
        return;
      }
      if (currentStep === steps.length + 4) {
        renderConfirmation();
        return;
      }

      const step = steps[currentStep - 2];
      questionEl.textContent = txt(step.question);
      helperEl.textContent = txt(step.helper);
      renderOptions(step);
      backBtn.disabled = currentStep === 0;
      nextBtn.textContent = currentStep === steps.length + 1
        ? (currentLang === "ar" ? "عرض الخطط" : "See Plans")
        : (currentLang === "ar" ? "التالي" : "Next");
      updateProgress();
      renderTimeline();
    }

    function renderResult() {
      questionEl.textContent = currentLang === "ar" ? "اختر الجلسات التدريبية" : "Select Training Sessions";
      helperEl.textContent = currentLang === "ar"
        ? "اختر جلسة واحدة أو أكثر (كل جلسة 3 أشهر). الجلسات التي بدأ شهرها تصبح غير متاحة."
        : "Select one or more fixed 3-month sessions. Sessions become unavailable after their start month begins.";
      optionsEl.innerHTML = "";
      backBtn.disabled = false;
      nextBtn.textContent = currentLang === "ar" ? "متابعة إلى الجدولة" : "Continue to Schedule";
      updateProgress();
      renderTimeline();

      const now = new Date();
      const nowMonth = now.getMonth();
      const nowDay = now.getDate();

      function isSessionClosed(startMonthIndex) {
        return nowMonth > startMonthIndex || (nowMonth === startMonthIndex && nowDay > 10);
      }

      const sessions = [
        {
          id: "q1",
          label: "Session 1",
          startMonthIndex: 0,
          range: currentLang === "ar" ? "يناير - مارس" : "Jan - Mar",
          note: currentLang === "ar" ? "يناير، فبراير، مارس" : "January, February, March"
        },
        {
          id: "q2",
          label: "Session 2",
          startMonthIndex: 3,
          range: currentLang === "ar" ? "أبريل - يونيو" : "Apr - Jun",
          note: currentLang === "ar" ? "أبريل، مايو، يونيو" : "April, May, June"
        },
        {
          id: "q3",
          label: "Session 3",
          startMonthIndex: 6,
          range: currentLang === "ar" ? "يوليو - سبتمبر" : "Jul - Sep",
          note: currentLang === "ar" ? "يوليو، أغسطس، سبتمبر" : "July, August, September"
        },
        {
          id: "q4",
          label: "Session 4",
          startMonthIndex: 9,
          range: currentLang === "ar" ? "أكتوبر - ديسمبر" : "Oct - Dec",
          note: currentLang === "ar" ? "أكتوبر، نوفمبر، ديسمبر" : "October, November, December"
        }
      ];

      const openSessionIds = new Set(
        sessions
          .filter((session) => !isSessionClosed(session.startMonthIndex))
          .map((session) => session.id)
      );
      selections.sessions = selections.sessions.filter((id) => openSessionIds.has(id));

      function toggleSession(id) {
        if (!openSessionIds.has(id)) return;
        const set = new Set(selections.sessions);
        if (set.has(id)) set.delete(id);
        else set.add(id);
        selections.sessions = [...set];
        renderSessionCards();
      }

      function renderSessionCards() {
        const cardsHtml = sessions.map((session) => {
          const isClosed = isSessionClosed(session.startMonthIndex);
          const selected = selections.sessions.includes(session.id);
          const closedText = currentLang === "ar" ? "مغلقة / غير متاحة" : "Closed / Not Available";
          return `
            <article class="plan ${isClosed ? "closed" : "selectable"} ${selected ? "selected" : ""}" ${isClosed ? "" : `data-session="${session.id}"`}>
              <h3>${displayValue(session.label)}</h3>
              <div class="plan-duration">${session.range}</div>
              <p>${session.note}</p>
              ${isClosed ? `<p class="session-status">${closedText}</p>` : ""}
            </article>
          `;
        }).join("");

        const selectedNames = sessions
          .filter((item) => selections.sessions.includes(item.id))
          .map((item) => displayValue(item.label))
          .join(", ");

        resultArea.innerHTML = `
          <div class="plans">${cardsHtml}</div>
          <p class="sessions-note"><strong>${currentLang === "ar" ? "الجلسات المختارة:" : "Selected sessions:"}</strong> ${selectedNames || (currentLang === "ar" ? "لا يوجد اختيار حتى الآن" : "None selected yet")}</p>
          <div class="summary">
            <strong>${currentLang === "ar" ? "ملخص الاختيار:" : "Selection summary:"}</strong><br>
            ${currentLang === "ar" ? "المجال" : "Sector"}: ${selections.sector.join(", ")}<br>
            ${currentLang === "ar" ? "حجم الشركة" : "Company Size"}: ${selections.companySize}<br>
            ${currentLang === "ar" ? "الخبرة" : "Experience"}: ${selections.experience}<br>
            ${currentLang === "ar" ? "الأهداف" : "Goals"}: ${selections.goals.join(", ")}<br>
            ${currentLang === "ar" ? "طريقة التدريب" : "Training Method"}: ${selections.training_method}
          </div>
        `;

        resultArea.querySelectorAll("[data-session]").forEach((el) => {
          el.addEventListener("click", () => toggleSession(el.getAttribute("data-session")));
        });
      }

      renderSessionCards();
    }

    function renderContactDetails() {
      questionEl.textContent = currentLang === "ar" ? "بيانات التواصل" : "Your Contact Details";
      helperEl.textContent = currentLang === "ar" ? "ابدأ بإدخال بياناتك الشخصية." : "Start by providing your personal details.";
      optionsEl.innerHTML = "";
      backBtn.disabled = true;
      nextBtn.textContent = currentLang === "ar" ? "متابعة" : "Continue";
      updateProgress();
      renderTimeline();

      resultArea.innerHTML = `
        <div class="scheduler">
          <div class="contact-grid">
            <div class="field">
              <label for="fullName">${currentLang === "ar" ? "الاسم الكامل" : "Full Name"}</label>
              <input id="fullName" class="text-input" type="text" value="${selections.fullName}" placeholder="${currentLang === "ar" ? "أدخل الاسم الكامل" : "Enter full name"}">
            </div>
            <div class="field">
              <label for="email">${currentLang === "ar" ? "البريد الإلكتروني" : "Email"}</label>
              <input id="email" class="text-input" type="email" value="${selections.email}" placeholder="${currentLang === "ar" ? "أدخل البريد الإلكتروني" : "Enter email"}">
            </div>
            <div class="field">
              <label for="phoneNumber">${currentLang === "ar" ? "رقم الهاتف" : "Phone Number"}</label>
              <input id="phoneNumber" class="text-input" type="tel" value="${selections.phoneNumber}" placeholder="${currentLang === "ar" ? "أدخل رقم الهاتف" : "Enter phone number"}">
            </div>
            <div class="field">
              <label for="city">${currentLang === "ar" ? "المدينة" : "City"}</label>
              <input id="city" class="text-input" type="text" value="${selections.city}" placeholder="${currentLang === "ar" ? "أدخل المدينة" : "Enter city"}">
            </div>
          </div>
        </div>
      `;
    }

    function renderCompanyDetails() {
      questionEl.textContent = currentLang === "ar" ? "بيانات الشركة" : "Company Details";
      helperEl.textContent = currentLang === "ar" ? "أدخل بيانات الشركة قبل المتابعة." : "Provide your company details before continuing.";
      optionsEl.innerHTML = "";
      backBtn.disabled = false;
      nextBtn.textContent = currentLang === "ar" ? "متابعة" : "Continue";
      updateProgress();
      renderTimeline();

      resultArea.innerHTML = `
        <div class="scheduler">
          <div class="contact-grid">
            <div class="field">
              <label for="companyName">${currentLang === "ar" ? "اسم الشركة" : "Company Name"}</label>
              <input id="companyName" class="text-input" type="text" value="${selections.companyName}" placeholder="${currentLang === "ar" ? "أدخل اسم الشركة" : "Enter company name"}">
            </div>
            <div class="field">
              <label for="position">${currentLang === "ar" ? "المنصب" : "Position"}</label>
              <input id="position" class="text-input" type="text" value="${selections.position}" placeholder="${currentLang === "ar" ? "أدخل المنصب" : "Enter position"}">
            </div>
            <div class="field">
              <label for="companyType">${currentLang === "ar" ? "نوع الشركة" : "Type of Company"}</label>
              <select id="companyType" class="text-input">
                <option value="">${currentLang === "ar" ? "اختر نوع الشركة" : "Select company type"}</option>
                <option value="Government" ${selections.companyType === "Government" ? "selected" : ""}>${currentLang === "ar" ? "حكومي" : "Government"}</option>
                <option value="Private" ${selections.companyType === "Private" ? "selected" : ""}>${currentLang === "ar" ? "خاص" : "Private"}</option>
                <option value="Non-profit" ${selections.companyType === "Non-profit" ? "selected" : ""}>${currentLang === "ar" ? "غير ربحي" : "Non-profit"}</option>
              </select>
            </div>
            ${selections.companyType === "Government" ? `
              <div class="field">
                <label for="governmentField">${currentLang === "ar" ? "المجال" : "Field"}</label>
                <input id="governmentField" class="text-input" type="text" value="${selections.governmentField}" placeholder="${currentLang === "ar" ? "أدخل المجال الحكومي" : "Enter government field"}">
              </div>
            ` : ""}
            ${(selections.companyType === "Private" || selections.companyType === "Non-profit") ? `
              <div class="field">
                <label for="organizationSector">${currentLang === "ar" ? "القطاع" : "Sector"}</label>
                <select id="organizationSector" class="text-input">
                  <option value="">${currentLang === "ar" ? "اختر القطاع" : "Select sector"}</option>
                  <option value="Technology" ${selections.organizationSector === "Technology" ? "selected" : ""}>${currentLang === "ar" ? "التقنية" : "Technology"}</option>
                  <option value="Finance & Banking" ${selections.organizationSector === "Finance & Banking" ? "selected" : ""}>${currentLang === "ar" ? "المالية والمصارف" : "Finance & Banking"}</option>
                  <option value="Healthcare" ${selections.organizationSector === "Healthcare" ? "selected" : ""}>${currentLang === "ar" ? "الرعاية الصحية" : "Healthcare"}</option>
                  <option value="Education" ${selections.organizationSector === "Education" ? "selected" : ""}>${currentLang === "ar" ? "التعليم" : "Education"}</option>
                  <option value="Manufacturing" ${selections.organizationSector === "Manufacturing" ? "selected" : ""}>${currentLang === "ar" ? "التصنيع" : "Manufacturing"}</option>
                  <option value="Retail & E-commerce" ${selections.organizationSector === "Retail & E-commerce" ? "selected" : ""}>${currentLang === "ar" ? "التجزئة والتجارة الإلكترونية" : "Retail & E-commerce"}</option>
                  <option value="Telecommunications" ${selections.organizationSector === "Telecommunications" ? "selected" : ""}>${currentLang === "ar" ? "الاتصالات" : "Telecommunications"}</option>
                  <option value="Energy & Utilities" ${selections.organizationSector === "Energy & Utilities" ? "selected" : ""}>${currentLang === "ar" ? "الطاقة والمرافق" : "Energy & Utilities"}</option>
                  <option value="Transportation & Logistics" ${selections.organizationSector === "Transportation & Logistics" ? "selected" : ""}>${currentLang === "ar" ? "النقل والخدمات اللوجستية" : "Transportation & Logistics"}</option>
                  <option value="Construction & Real Estate" ${selections.organizationSector === "Construction & Real Estate" ? "selected" : ""}>${currentLang === "ar" ? "الإنشاءات والعقارات" : "Construction & Real Estate"}</option>
                  <option value="Hospitality & Tourism" ${selections.organizationSector === "Hospitality & Tourism" ? "selected" : ""}>${currentLang === "ar" ? "الضيافة والسياحة" : "Hospitality & Tourism"}</option>
                  <option value="Media & Entertainment" ${selections.organizationSector === "Media & Entertainment" ? "selected" : ""}>${currentLang === "ar" ? "الإعلام والترفيه" : "Media & Entertainment"}</option>
                  <option value="Agriculture" ${selections.organizationSector === "Agriculture" ? "selected" : ""}>${currentLang === "ar" ? "الزراعة" : "Agriculture"}</option>
                  <option value="Legal Services" ${selections.organizationSector === "Legal Services" ? "selected" : ""}>${currentLang === "ar" ? "الخدمات القانونية" : "Legal Services"}</option>
                  <option value="Consulting & Professional Services" ${selections.organizationSector === "Consulting & Professional Services" ? "selected" : ""}>${currentLang === "ar" ? "الاستشارات والخدمات المهنية" : "Consulting & Professional Services"}</option>
                  <option value="NGO & Community Services" ${selections.organizationSector === "NGO & Community Services" ? "selected" : ""}>${currentLang === "ar" ? "خدمات المجتمع والمنظمات غير الحكومية" : "NGO & Community Services"}</option>
                  <option value="Other" ${selections.organizationSector === "Other" ? "selected" : ""}>${currentLang === "ar" ? "أخرى" : "Other"}</option>
                </select>
              </div>
              ${selections.organizationSector === "Other" ? `
                <div class="field">
                  <label for="organizationSectorOther">${currentLang === "ar" ? "قطاع آخر" : "Other Sector"}</label>
                  <input id="organizationSectorOther" class="text-input" type="text" value="${selections.organizationSectorOther}" placeholder="${currentLang === "ar" ? "أدخل اسم القطاع" : "Enter sector name"}">
                </div>
              ` : ""}
            ` : ""}
          </div>
        </div>
      `;

      function syncCompanyDraftFromInputs() {
        const companyNameInput = document.getElementById("companyName");
        const positionInput = document.getElementById("position");
        const governmentFieldInput = document.getElementById("governmentField");
        const organizationSectorInput = document.getElementById("organizationSector");
        const organizationSectorOtherInput = document.getElementById("organizationSectorOther");

        if (companyNameInput) selections.companyName = companyNameInput.value;
        if (positionInput) selections.position = positionInput.value;
        if (governmentFieldInput) selections.governmentField = governmentFieldInput.value;
        if (organizationSectorInput) selections.organizationSector = organizationSectorInput.value;
        if (organizationSectorOtherInput) selections.organizationSectorOther = organizationSectorOtherInput.value;
      }

      const companyTypeInput = document.getElementById("companyType");
      if (companyTypeInput) {
        companyTypeInput.addEventListener("change", (e) => {
          syncCompanyDraftFromInputs();
          selections.companyType = e.target.value;
          if (selections.companyType !== "Government") {
            selections.governmentField = "";
          }
          if (selections.companyType !== "Private" && selections.companyType !== "Non-profit") {
            selections.organizationSector = "";
            selections.organizationSectorOther = "";
          }
          renderCompanyDetails();
        });
      }

      const governmentFieldInput = document.getElementById("governmentField");
      if (governmentFieldInput) {
        governmentFieldInput.addEventListener("input", (e) => {
          selections.governmentField = e.target.value;
        });
      }

      const organizationSectorInput = document.getElementById("organizationSector");
      if (organizationSectorInput) {
        organizationSectorInput.addEventListener("change", (e) => {
          syncCompanyDraftFromInputs();
          selections.organizationSector = e.target.value;
          if (selections.organizationSector !== "Other") {
            selections.organizationSectorOther = "";
          }
          renderCompanyDetails();
        });
      }

      const organizationSectorOtherInput = document.getElementById("organizationSectorOther");
      if (organizationSectorOtherInput) {
        organizationSectorOtherInput.addEventListener("input", (e) => {
          selections.organizationSectorOther = e.target.value;
        });
      }
    }

    async function submitLead() {
      const resolvedOrganizationSector =
        selections.organizationSector === "Other"
          ? selections.organizationSectorOther
          : selections.organizationSector;

      const sessionsDetailed = selections.sessions.map((id) => {
        if (id === "q1") return { id, label: "Session 1", range: "Jan - Mar" };
        if (id === "q2") return { id, label: "Session 2", range: "Apr - Jun" };
        if (id === "q3") return { id, label: "Session 3", range: "Jul - Sep" };
        if (id === "q4") return { id, label: "Session 4", range: "Oct - Dec" };
        return { id, label: id, range: "" };
      });

      const payload = {
        submittedAt: new Date().toISOString(),
        language: currentLang,
        otherTextByStep,
        fullName: selections.fullName,
        email: selections.email,
        phoneNumber: selections.phoneNumber,
        city: selections.city,
        position: selections.position,
        companyName: selections.companyName,
        companyType: selections.companyType,
        governmentField: selections.governmentField,
        organizationSector: selections.organizationSector,
        organizationSectorOther: selections.organizationSectorOther,
        organizationSectorResolved: resolvedOrganizationSector,
        companyFieldTag: selections.governmentField || resolvedOrganizationSector || "",
        sector: selections.sector,
        companySize: selections.companySize,
        experience: selections.experience,
        goals: selections.goals,
        trainingMethod: selections.training_method,
        sessions: selections.sessions,
        sessionsDetailed,
        meetingDate: selections.meetingDate,
        meetingTime: selections.meetingTime,
        meetingDurationMinutes: 20,
        timezone: Intl.DateTimeFormat().resolvedOptions().timeZone || "UTC"
      };

      const response = await fetch(WEBHOOK_URL, {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(payload)
      });

      if (!response.ok) {
        let msg = currentLang === "ar"
          ? "فشل الإرسال. يرجى المحاولة مرة أخرى."
          : "Submission failed. Please try again.";
        try {
          const err = await response.json();
          if (err && err.message) msg = err.message;
        } catch (_) {
          // Keep default fallback message.
        }
        throw new Error(msg);
      }

      return response.json().catch(() => ({}));
    }

    function renderSchedule() {
      questionEl.textContent = currentLang === "ar" ? "جدولة اجتماع 20 دقيقة" : "Schedule Your 20-Minute Meeting";
      helperEl.textContent = currentLang === "ar" ? "اختر التاريخ ووقت الاجتماع المتاح (11:00 إلى 2:00)." : "Select a date and one available time slot (11:00 to 2:00 PM).";
      optionsEl.innerHTML = "";
      backBtn.disabled = false;
      nextBtn.style.display = "none";
      updateProgress();
      renderTimeline();

      const slots = ["11:00", "11:20", "11:40", "12:00", "12:20", "12:40", "13:00", "13:20", "13:40", "14:00"];

      const slotsHtml = slots.map((slot) => `
        <button type="button" class="time-slot ${selections.meetingTime === slot ? "active" : ""}" data-slot="${slot}">
          ${slot}
        </button>
      `).join("");

      resultArea.innerHTML = `
        <div class="scheduler">
          <label for="meetingDate">${currentLang === "ar" ? "اختر التاريخ" : "Select date"}</label>
          <input id="meetingDate" class="date-input" type="date" value="${selections.meetingDate}">
          <label>${currentLang === "ar" ? "اختر الوقت (20 دقيقة)" : "Select time (20 minutes)"}</label>
          <div class="time-slots">${slotsHtml}</div>
          <button id="submitBtn" type="button" class="calendar-btn">${currentLang === "ar" ? "إرسال وجدولة" : "Submit & Schedule"}</button>
          <p class="sessions-note"><strong>${currentLang === "ar" ? "الموعد المختار:" : "Chosen schedule:"}</strong> ${selections.meetingDate || (currentLang === "ar" ? "لم يتم اختيار تاريخ" : "No date selected")} ${selections.meetingTime || ""}</p>
          <div id="submitStatus" class="submit-status"></div>
        </div>
      `;

      const dateInput = document.getElementById("meetingDate");
      const pad = (n) => String(n).padStart(2, "0");
      const now = new Date();
      const todayStr = `${now.getFullYear()}-${pad(now.getMonth() + 1)}-${pad(now.getDate())}`;
      dateInput.setAttribute("min", todayStr);
      if (selections.meetingDate && selections.meetingDate < todayStr) {
        selections.meetingDate = "";
      }
      dateInput.value = selections.meetingDate || "";
      dateInput.addEventListener("change", (e) => {
        selections.meetingDate = e.target.value;
        renderSchedule();
      });

      resultArea.querySelectorAll("[data-slot]").forEach((el) => {
        el.addEventListener("click", () => {
          selections.meetingTime = el.getAttribute("data-slot");
          renderSchedule();
        });
      });

      document.getElementById("submitBtn").addEventListener("click", async () => {
        const submitBtn = document.getElementById("submitBtn");
        const submitStatus = document.getElementById("submitStatus");

        if (!selections.meetingDate || !selections.meetingTime) {
          setError(currentLang === "ar" ? "يرجى اختيار التاريخ والوقت قبل الإرسال." : "Please select both date and time before submitting.");
          return;
        }

        const padCheck = (n) => String(n).padStart(2, "0");
        const n = new Date();
        const todayCheck = `${n.getFullYear()}-${padCheck(n.getMonth() + 1)}-${padCheck(n.getDate())}`;
        if (selections.meetingDate < todayCheck) {
          setError(currentLang === "ar" ? "لا يمكن اختيار تاريخ في الماضي." : "Past dates are not allowed.");
          selections.meetingDate = "";
          renderSchedule();
          return;
        }

        setError("");
        submitStatus.textContent = currentLang === "ar" ? "جاري الإرسال..." : "Submitting...";
        submitStatus.className = "submit-status";
        submitBtn.disabled = true;

        try {
          await submitLead();
          submitStatus.textContent = currentLang === "ar" ? "تم الإرسال بنجاح." : "Submitted successfully.";
          submitStatus.className = "submit-status success";
          currentStep = steps.length + 4;
          setTimeout(() => renderStep(), 500);
        } catch (error) {
          submitStatus.textContent = error.message || "Submission failed.";
          submitStatus.className = "submit-status error";
        } finally {
          submitBtn.disabled = false;
        }
      });
    }

    function renderConfirmation() {
      questionEl.textContent = currentLang === "ar" ? "تم حجز الاجتماع بنجاح" : "Meeting Scheduled Successfully";
      helperEl.textContent = currentLang === "ar"
        ? "تم جدولة مكالمتك بنجاح، وستتلقى رسالة تأكيد عبر البريد الإلكتروني قريبًا."
        : "Your call is scheduled, and you'll receive a confirmation email shortly.";
      optionsEl.innerHTML = "";
      backBtn.disabled = true;
      nextBtn.style.display = "none";
      updateProgress();
      renderTimeline();

      resultArea.innerHTML = `
        <div class="scheduler">
          <p class="sessions-note"><strong>${currentLang === "ar" ? "الاسم:" : "Name:"}</strong> ${selections.fullName}</p>
          <p class="sessions-note"><strong>${currentLang === "ar" ? "البريد الإلكتروني:" : "Email:"}</strong> ${selections.email}</p>
          <p class="sessions-note"><strong>${currentLang === "ar" ? "الهاتف:" : "Phone:"}</strong> ${selections.phoneNumber}</p>
          <p class="sessions-note"><strong>${currentLang === "ar" ? "المدينة:" : "City:"}</strong> ${selections.city}</p>
          <p class="sessions-note"><strong>${currentLang === "ar" ? "المنصب:" : "Position:"}</strong> ${selections.position}</p>
          <p class="sessions-note"><strong>${currentLang === "ar" ? "الشركة:" : "Company:"}</strong> ${selections.companyName}</p>
          <p class="sessions-note"><strong>${currentLang === "ar" ? "نوع الشركة:" : "Company Type:"}</strong> ${displayValue(selections.companyType)}</p>
          ${selections.companyType === "Government" ? `<p class="sessions-note"><strong>${currentLang === "ar" ? "المجال:" : "Field:"}</strong> ${selections.governmentField}</p>` : ""}
          ${(selections.companyType === "Private" || selections.companyType === "Non-profit") ? `<p class="sessions-note"><strong>${currentLang === "ar" ? "القطاع:" : "Sector:"}</strong> ${selections.organizationSector === "Other" ? selections.organizationSectorOther : displayValue(selections.organizationSector)}</p>` : ""}
          <p class="sessions-note"><strong>${currentLang === "ar" ? "الموعد:" : "Scheduled for:"}</strong> ${selections.meetingDate} ${selections.meetingTime}</p>
          <p class="sessions-note"><strong>${currentLang === "ar" ? "الجلسات المختارة:" : "Selected sessions:"}</strong> ${selections.sessions.map(displayValue).join(", ")}</p>
          <div class="confirm-note">
            ${currentLang === "ar"
              ? "تم إرسال النموذج بنجاح. يمكنك الآن إغلاق هذه النافذة."
              : "Your form was submitted successfully. You can now close this form window."}
          </div>
          <button id="closeFormBtn" type="button" class="close-form-btn">
            ${currentLang === "ar" ? "إغلاق النموذج" : "Close Form"}
          </button>
        </div>
      `;

      const closeFormBtn = document.getElementById("closeFormBtn");
      if (closeFormBtn) {
        closeFormBtn.addEventListener("click", () => {
          window.close();
          // Browser may block script-close for non-opened tabs.
          setError(currentLang === "ar"
            ? "يمكنك إغلاق الصفحة يدويًا من المتصفح."
            : "Please close this page manually from your browser.");
        });
      }
    }

    nextBtn.addEventListener("click", () => {
      if (currentStep === steps.length + 4) {
        currentStep = 0;
        selections.sector = [];
        selections.companySize = "";
        selections.experience = "";
        selections.goals = [];
        selections.training_method = "";
        selections.sessions = [];
        selections.fullName = "";
        selections.email = "";
        selections.phoneNumber = "";
        selections.city = "";
        selections.position = "";
        selections.companyName = "";
        selections.companyType = "";
        selections.governmentField = "";
        selections.organizationSector = "";
        selections.organizationSectorOther = "";
        selections.meetingDate = "";
        selections.meetingTime = "";
        Object.keys(otherTextByStep).forEach((k) => delete otherTextByStep[k]);
        renderStep();
        return;
      }

      if (currentStep === 0) {
        const fullNameInput = document.getElementById("fullName");
        const emailInput = document.getElementById("email");
        const phoneNumberInput = document.getElementById("phoneNumber");
        const cityInput = document.getElementById("city");

        const fullName = fullNameInput ? fullNameInput.value.trim() : selections.fullName;
        const email = emailInput ? emailInput.value.trim() : selections.email;
        const phoneNumber = phoneNumberInput ? phoneNumberInput.value.trim() : selections.phoneNumber;
        const city = cityInput ? cityInput.value.trim() : selections.city;

        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!fullName || !email || !phoneNumber || !city) {
          setError(currentLang === "ar" ? "يرجى إدخال الاسم والبريد الإلكتروني ورقم الهاتف والمدينة للمتابعة." : "Please fill name, email, phone number, and city to continue.");
          return;
        }
        if (!emailPattern.test(email)) {
          setError(currentLang === "ar" ? "يرجى إدخال بريد إلكتروني صحيح." : "Please enter a valid email address.");
          return;
        }

        selections.fullName = fullName;
        selections.email = email;
        selections.phoneNumber = phoneNumber;
        selections.city = city;
        setError("");
        currentStep += 1;
        renderStep();
        return;
      }

      if (currentStep === 1) {
        const companyNameInput = document.getElementById("companyName");
        const positionInput = document.getElementById("position");
        const companyTypeInput = document.getElementById("companyType");
        const governmentFieldInput = document.getElementById("governmentField");
        const organizationSectorInput = document.getElementById("organizationSector");
        const organizationSectorOtherInput = document.getElementById("organizationSectorOther");

        const companyName = companyNameInput ? companyNameInput.value.trim() : selections.companyName;
        const position = positionInput ? positionInput.value.trim() : selections.position;
        const companyType = companyTypeInput ? companyTypeInput.value : selections.companyType;
        const governmentField = governmentFieldInput ? governmentFieldInput.value.trim() : selections.governmentField;
        const organizationSector = organizationSectorInput ? organizationSectorInput.value.trim() : selections.organizationSector;
        const organizationSectorOther = organizationSectorOtherInput ? organizationSectorOtherInput.value.trim() : selections.organizationSectorOther;

        if (!companyName || !position || !companyType) {
          setError(currentLang === "ar" ? "يرجى إدخال اسم الشركة والمنصب ونوع الشركة للمتابعة." : "Please fill company name, position, and company type to continue.");
          return;
        }
        if (companyType === "Government" && !governmentField) {
          setError(currentLang === "ar" ? "يرجى إدخال المجال الحكومي." : "Please enter the government field.");
          return;
        }
        if ((companyType === "Private" || companyType === "Non-profit") && !organizationSector) {
          setError(currentLang === "ar" ? "يرجى اختيار القطاع." : "Please enter the sector.");
          return;
        }
        if ((companyType === "Private" || companyType === "Non-profit") && organizationSector === "Other" && !organizationSectorOther) {
          setError(currentLang === "ar" ? "يرجى إدخال اسم القطاع الآخر." : "Please enter the other sector name.");
          return;
        }

        selections.companyName = companyName;
        selections.position = position;
        selections.companyType = companyType;
        selections.governmentField = governmentField;
        selections.organizationSector = organizationSector;
        selections.organizationSectorOther = organizationSectorOther;
        setError("");
        currentStep += 1;
        renderStep();
        return;
      }

      if (currentStep === steps.length + 2) {
        if (!selections.sessions.length) {
          setError(currentLang === "ar" ? "يرجى اختيار جلسة واحدة على الأقل للمتابعة." : "Please select at least one session to continue.");
          return;
        }
        currentStep += 1;
        renderStep();
        return;
      }

      const step = steps[currentStep - 2];
      if (!isStepValid(step)) {
        const msg = step.multiple
          ? (currentLang === "ar" ? "يرجى اختيار خيار واحد على الأقل للمتابعة." : "Please select at least one option to continue.")
          : (currentLang === "ar" ? "يرجى اختيار خيار واحد للمتابعة." : "Please select one option to continue.");
        setError(msg);
        return;
      }

      currentStep += 1;
      renderStep();
    });

    backBtn.addEventListener("click", () => {
      if (currentStep === 0) return;
      currentStep -= 1;
      renderStep();
    });

    langToggle.addEventListener("click", () => {
      currentLang = currentLang === "en" ? "ar" : "en";
      applyLanguage();
    });

    applyLanguage();
  </script>

