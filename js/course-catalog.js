(function () {
  const categoryLabels = {
    leadership: "القيادة والإدارة",
    marketing: "التسويق والمبيعات الحديثة",
    technical: "الدورات التقنية",
    HealthandSafety: "الأمن والسلامة والصحة المهنية",
    ArtificialIntelligence: "الذكاء الاصطناعي والأتمتة",
    finance: "المالية والمحاسبة",
    design: "التصميم والإبداع المرئي",
    productivity: "المهارات الرقمية والإنتاجية"
  };

  const corporateCourseDetails = {
    leadership: {
      description:
        "برامج متقدمة تستهدف القيادات والإدارة العليا، وتركز على اتخاذ القرار والقيادة المؤثرة.",
      courses: [
        "اتخاذ القرار الاستراتيجي",
        "القيادة التحويلية",
        "الذكاء العاطفي في القيادة",
        "إدارة الأداء المؤسسي",
        "الحوكمة وإدارة المخاطر"
      ],
      images: [
        "https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=1200&q=80",
        "https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1200&q=80",
        "https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=80",
        "https://images.unsplash.com/photo-1553877522-43269d4ea984?auto=format&fit=crop&w=1200&q=80",
        "https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&w=1200&q=80"
      ]
    },
    marketing: {
      description:
        "برامج حديثة تواكب تطورات السوق وتركز على التحول الرقمي والأتمتة واستراتيجيات النمو.",
      courses: [
        "إطلاق وإدارة الحملات التسويقية",
        "أتمتة التسويق (Marketing Automation)",
        "أتمتة المبيعات (Sales Automation)",
        "كتابة المحتوى التسويقي",
        "تحليل بيانات العملاء",
        "استراتيجيات النمو الرقمي"
      ],
      images: [
        "https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1200&q=80",
        "https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1200&q=80",
        "https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=1200&q=80",
        "https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1200&q=80",
        "https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&w=1200&q=80",
        "https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=1200&q=80"
      ]
    },
    technical: {
      description:
        "برامج تقنية عملية تغطي المهارات الرقمية الأساسية والمتقدمة لدعم بيئة العمل الحديثة.",
      courses: [
        "Excel (مبتدئ – متقدم)",
        "Power BI وتحليل البيانات",
        "أساسيات الذكاء الاصطناعي",
        "إدارة البيانات",
        "أدوات العمل الرقمية"
      ],
      images: [
        "https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=1200&q=80",
        "https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1200&q=80",
        "https://images.unsplash.com/photo-1677442136019-21780ecad995?auto=format&fit=crop&w=1200&q=80",
        "https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1200&q=80",
        "https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1200&q=80"
      ]
    },
    HealthandSafety: {
      description:
        "تستهدف مسؤولي المواقع والمهندسين ومشرفي السلامة لتعزيز الامتثال وتقليل المخاطر التشغيلية.",
      courses: [
        "الأوشا (OSHA) في السلامة والصحة المهنية",
        "إدارة السلامة في بيئة العمل",
        "الإسعافات الأولية والتعامل مع الطوارئ",
        "نظام الآيزو (ISO 45001)"
      ],
      images: [
        "https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&w=1200&q=80",
        "https://images.unsplash.com/photo-1581092160562-40aa08e78837?auto=format&fit=crop&w=1200&q=80",
        "https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=1200&q=80",
        "https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=1200&q=80"
      ]
    },
    ArtificialIntelligence: {
      description:
        "تستهدف الموظفين الراغبين في زيادة الإنتاجية باستخدام التقنيات الحديثة داخل الأعمال.",
      courses: [
        "تطبيقات الذكاء الاصطناعي في الأعمال (ChatGPT وGemini)",
        "أتمتة المهام اليومية (No-Code)",
        "هندسة الأوامر (Prompt Engineering)",
        "أخلاقيات الذكاء الاصطناعي والأمن السيبراني للموظفين"
      ],
      images: [
        "https://images.unsplash.com/photo-1677442135703-1787eea5ce01?auto=format&fit=crop&w=1200&q=80",
        "https://images.unsplash.com/photo-1485827404703-89b55fcc595e?auto=format&fit=crop&w=1200&q=80",
        "https://images.unsplash.com/photo-1620712943543-bcc4688e7485?auto=format&fit=crop&w=1200&q=80",
        "https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=1200&q=80"
      ]
    },
    finance: {
      description:
        "تستهدف المحاسبين وغير الماليين الذين يحتاجون لفهم الأرقام والامتثال المالي الحديث.",
      courses: [
        "المالية لغير الماليين",
        "المحاسبة الضريبية (VAT) والزكاة",
        "التحليل المالي المتقدم وتوقع التدفقات النقدية",
        "المراجعة الداخلية والرقابة المالية"
      ],
      images: [
        "https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&fit=crop&w=1200&q=80",
        "https://images.unsplash.com/photo-1507679799987-c73779587ccf?auto=format&fit=crop&w=1200&q=80",
        "https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?auto=format&fit=crop&w=1200&q=80",
        "https://images.unsplash.com/photo-1544531586-fde5298cdd40?auto=format&fit=crop&w=1200&q=80"
      ]
    },
    design: {
      description: "تستهدف المصممين المبتدئين والمحترفين لبناء مخرجات بصرية قوية للشركات.",
      courses: [
        "أساسيات الجرافيك ديزاين (Adobe Photoshop & Illustrator)",
        "تصميم واجهات المستخدم (UI/UX)",
        "المونتاج وصناعة المحتوى المرئي (Adobe Premiere & After Effects)",
        "التصميم عبر Canva"
      ],
      images: [
        "https://images.unsplash.com/photo-1558655146-d09347e92766?auto=format&fit=crop&w=1200&q=80",
        "https://images.unsplash.com/photo-1561070791-2526d30994b5?auto=format&fit=crop&w=1200&q=80",
        "https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1200&q=80",
        "https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1200&q=80"
      ]
    },
    productivity: {
      description: "تستهدف جميع الموظفين لرفع كفاءة العمل المكتبي والإنتاجية اليومية.",
      courses: [
        "إكسيل من الصفر إلى الاحتراف (Excel Dashboard)",
        "احتراف أدوات Google Workspace",
        "مهارات العرض والتقديم عبر (PowerPoint & Prezi)",
        "الأمن السيبراني الشخصي"
      ],
      images: [
        "https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&w=1200&q=80",
        "https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=1200&q=80",
        "https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=1200&q=80",
        "https://images.unsplash.com/photo-1557804506-669a67965ba0?auto=format&fit=crop&w=1200&q=80"
      ]
    }
  };

  const categoryCoverMap = {
    leadership:
      "https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1200&q=80",
    marketing:
      "https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1200&q=80",
    technical:
      "https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1200&q=80",
    HealthandSafety:
      "https://images.unsplash.com/photo-1581093458791-9f3c3900df4b?auto=format&fit=crop&w=1200&q=80",
    ArtificialIntelligence:
      "https://images.unsplash.com/photo-1677442135703-1787eea5ce01?auto=format&fit=crop&w=1200&q=80",
    finance:
      "https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&fit=crop&w=1200&q=80",
    design:
      "https://images.unsplash.com/photo-1561070791-2526d30994b5?auto=format&fit=crop&w=1200&q=80",
    productivity:
      "https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=1200&q=80"
  };

  function buildCourses() {
    return Object.entries(corporateCourseDetails).flatMap(([categoryKey, section]) =>
      section.courses.map((courseName, index) => ({
        id: `${categoryKey}-${index + 1}`,
        category: categoryKey,
        title: courseName,
        description: section.description,
        cover: section.images[index] || categoryCoverMap[categoryKey] || "./assets/book_3.png",
        employees: "15-30 موظفًا",
        completionTime: "2-5 أيام تدريبية",
        deliveryModes: ["أونلاين مباشر", "حضوري في مقر الجهة", "فيديوهات مسجلة"],
        keyPoints: [
          "تقييم قبلي وربط المحتوى بأهداف الجهة",
          "تطبيقات عملية وسيناريوهات واقعية من بيئة العمل",
          "تقرير متابعة وتوصيات قابلة للتنفيذ"
        ]
      }))
    );
  }

  let _coursesCache;
  function getCourses() {
    if (!_coursesCache) _coursesCache = buildCourses();
    return _coursesCache;
  }

  window.AltawthiqCourseCatalog = {
    categoryLabels,
    corporateCourseDetails,
    categoryCoverMap,
    getCourses,
    findCourseById(id) {
      return getCourses().find((c) => c.id === id) || getCourses()[0];
    }
  };
})();
