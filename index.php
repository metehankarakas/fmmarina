<?php
session_start();

date_default_timezone_set('Europe/Istanbul');

$phoneDigits = '905388834648';
$phoneDisplay = '+90 538 883 46 48';
$email = 'info@fmmarina.com';
$instagramProfile = 'https://www.instagram.com/fmmarina/';
$defaultLang = 'tr';
$supportedLangs = ['tr', 'en', 'de', 'ru'];
$currentYear = date('Y');
$todayLabel = date('d.m.Y');

$metrics = [
    ['value' => '10+', 'label' => ['tr' => 'Yıllık sektör deneyimi', 'en' => 'Years of industry experience', 'de' => 'Jahre Branchenerfahrung', 'ru' => 'Лет опыта в отрасли']],
    ['value' => '250+', 'label' => ['tr' => 'Tamamlanan tekne projesi', 'en' => 'Completed boat projects', 'de' => 'Abgeschlossene Bootsprojekte', 'ru' => 'Завершенных проектов']],
    ['value' => '48s', 'label' => ['tr' => 'Ortalama ilk dönüş süresi', 'en' => 'Average first response time', 'de' => 'Durchschnittliche Erstreaktion', 'ru' => 'Среднее время первого ответа']],
    ['value' => '7/24', 'label' => ['tr' => 'Hızlı iletişim desteği', 'en' => 'Fast communication support', 'de' => 'Schneller Support', 'ru' => 'Быстрая поддержка']],
];

$services = [
    [
        'key' => 'maintenance',
        'icon' => '🛠️',
        'title' => ['tr' => 'Tekne Bakım & Onarım', 'en' => 'Boat Maintenance & Repair', 'de' => 'Bootswartung & Reparatur', 'ru' => 'Обслуживание и ремонт лодок'],
        'description' => ['tr' => 'Gövdeden güverteye kadar sezonluk bakım, arıza tespiti ve koruyucu uygulamalar.', 'en' => 'Seasonal care, diagnostics and preventive applications from hull to deck.', 'de' => 'Saisonpflege, Diagnose und Schutzanwendungen von Rumpf bis Deck.', 'ru' => 'Сезонное обслуживание, диагностика и защита от корпуса до палубы.'],
        'features' => [
            ['tr' => 'Koruyucu bakım planı', 'en' => 'Preventive care plan', 'de' => 'Präventiver Wartungsplan', 'ru' => 'План профилактического ухода'],
            ['tr' => 'Teslim öncesi kalite kontrol', 'en' => 'Pre-delivery quality control', 'de' => 'Qualitätskontrolle vor Übergabe', 'ru' => 'Контроль качества перед сдачей'],
        ],
    ],
    [
        'key' => 'paint',
        'icon' => '🎨',
        'title' => ['tr' => 'Boya Uygulamaları', 'en' => 'Paint Applications', 'de' => 'Lackierarbeiten', 'ru' => 'Покрасочные работы'],
        'description' => ['tr' => 'UV dayanımlı profesyonel boya sistemleriyle estetik ve uzun ömürlü yüzeyler.', 'en' => 'Durable and aesthetic surfaces with UV-resistant professional paint systems.', 'de' => 'Langlebige und ästhetische Oberflächen mit UV-beständigen Profisystemen.', 'ru' => 'Долговечные и эстетичные покрытия с профессиональными UV-стойкими системами.'],
        'features' => [
            ['tr' => 'Renk eşleştirme', 'en' => 'Color matching', 'de' => 'Farbabstimmung', 'ru' => 'Подбор цвета'],
            ['tr' => 'Katmanlı koruma', 'en' => 'Layered protection', 'de' => 'Mehrschichtiger Schutz', 'ru' => 'Многослойная защита'],
        ],
    ],
    [
        'key' => 'surface',
        'icon' => '🧽',
        'title' => ['tr' => 'Zımpara & Yüzey Hazırlığı', 'en' => 'Sanding & Surface Prep', 'de' => 'Schleifen & Oberflächenvorbereitung', 'ru' => 'Шлифовка и подготовка поверхности'],
        'description' => ['tr' => 'Mükemmel sonuç için doğru yüzey hazırlığı, katman kontrolü ve detaylı uygulama.', 'en' => 'Layer checks and detail-focused prep for a flawless finish.', 'de' => 'Schichtkontrolle und detailorientierte Vorbereitung für perfekte Ergebnisse.', 'ru' => 'Контроль слоев и тщательная подготовка для идеального результата.'],
        'features' => [
            ['tr' => 'Nem ve yüzey kontrolü', 'en' => 'Moisture and surface checks', 'de' => 'Feuchte- und Oberflächenkontrolle', 'ru' => 'Контроль влажности и поверхности'],
            ['tr' => 'Uygun astar hazırlığı', 'en' => 'Primer-ready prep', 'de' => 'Vorbereitung für Grundierung', 'ru' => 'Подготовка под грунт'],
        ],
    ],
    [
        'key' => 'polish',
        'icon' => '✨',
        'title' => ['tr' => 'Cila & Polish', 'en' => 'Polish & Detailing', 'de' => 'Politur & Detailing', 'ru' => 'Полировка и детейлинг'],
        'description' => ['tr' => 'Parlaklık, koruma ve premium görünüm sağlayan son kat uygulamaları.', 'en' => 'Final-stage detailing for shine, protection and a premium look.', 'de' => 'Finish-Detailing für Glanz, Schutz und Premium-Look.', 'ru' => 'Финишный детейлинг для блеска, защиты и премиального вида.'],
        'features' => [
            ['tr' => 'Seramik ve wax opsiyonları', 'en' => 'Ceramic and wax options', 'de' => 'Keramik- und Wachsoptionen', 'ru' => 'Опции керамики и воска'],
            ['tr' => 'Teslimat öncesi son kontrol', 'en' => 'Final handover inspection', 'de' => 'Endkontrolle vor Übergabe', 'ru' => 'Финальная проверка перед сдачей'],
        ],
    ],
];

$processSteps = [
    ['tr' => ['title' => '1) Keşif & Planlama', 'desc' => 'Teknenin mevcut durumunu analiz eder, iş kapsamını ve teslim planını birlikte netleştiririz.'], 'en' => ['title' => '1) Discovery & Planning', 'desc' => 'We assess the boat, define scope and align on a delivery plan.'], 'de' => ['title' => '1) Analyse & Planung', 'desc' => 'Wir prüfen das Boot, definieren den Umfang und planen die Übergabe.'], 'ru' => ['title' => '1) Осмотр и план', 'desc' => 'Оцениваем лодку, формируем объем работ и план сдачи.']],
    ['tr' => ['title' => '2) Uygulama', 'desc' => 'Yüzey hazırlığı, bakım, boya ve detay işlemlerini profesyonel ekipmanla yürütürüz.'], 'en' => ['title' => '2) Execution', 'desc' => 'Preparation, maintenance, paint and detailing are completed with professional tools.'], 'de' => ['title' => '2) Umsetzung', 'desc' => 'Vorbereitung, Wartung, Lackierung und Detailing erfolgen mit Profi-Equipment.'], 'ru' => ['title' => '2) Выполнение', 'desc' => 'Подготовка, обслуживание, покраска и детейлинг выполняются профессионально.']],
    ['tr' => ['title' => '3) Raporlama', 'desc' => 'Fotoğraf, video ve kilometre taşı bazlı güncellemelerle süreci görünür kılarız.'], 'en' => ['title' => '3) Reporting', 'desc' => 'We keep the process visible with photo, video and milestone updates.'], 'de' => ['title' => '3) Reporting', 'desc' => 'Wir machen den Prozess mit Fotos, Videos und Meilenstein-Updates transparent.'], 'ru' => ['title' => '3) Отчетность', 'desc' => 'Делаем процесс прозрачным с фото, видео и статус-обновлениями.']],
    ['tr' => ['title' => '4) Teslim & Destek', 'desc' => 'Teslim sonrası tavsiyeler, bakım notları ve ihtiyaç halinde hızlı destek sunarız.'], 'en' => ['title' => '4) Delivery & Support', 'desc' => 'We hand over with care notes, maintenance tips and responsive support.'], 'de' => ['title' => '4) Übergabe & Support', 'desc' => 'Übergabe mit Pflegehinweisen, Wartungstipps und schnellem Support.'], 'ru' => ['title' => '4) Сдача и поддержка', 'desc' => 'Передаем лодку с рекомендациями по уходу и быстрым сопровождением.']],
];

$packages = [
    ['label' => ['tr' => 'Standart Bakım', 'en' => 'Standard Care', 'de' => 'Standardpflege', 'ru' => 'Стандартный уход'], 'multiplier' => 1.0],
    ['label' => ['tr' => 'Bakım + Boya', 'en' => 'Care + Paint', 'de' => 'Pflege + Lack', 'ru' => 'Уход + покраска'], 'multiplier' => 1.4],
    ['label' => ['tr' => 'Komple Refit', 'en' => 'Complete Refit', 'de' => 'Komplett-Refit', 'ru' => 'Полный рефит'], 'multiplier' => 1.7],
];

$extraServices = [
    ['price' => 12000, 'label' => ['tr' => 'Motor detayı', 'en' => 'Engine detailing', 'de' => 'Motor-Detailing', 'ru' => 'Детейлинг двигателя']],
    ['price' => 9000, 'label' => ['tr' => 'Teak temizliği', 'en' => 'Teak cleaning', 'de' => 'Teak-Reinigung', 'ru' => 'Чистка тика']],
    ['price' => 6000, 'label' => ['tr' => 'Seramik koruma', 'en' => 'Ceramic protection', 'de' => 'Keramikschutz', 'ru' => 'Керамическая защита']],
];

$showcaseProjects = [
    ['title' => ['tr' => 'Motoryat Detay Yenileme', 'en' => 'Motor Yacht Detail Refresh', 'de' => 'Motoryacht Detail-Refresh', 'ru' => 'Обновление моторной яхты'], 'desc' => ['tr' => '42ft gövdede boya sonrası tam parlatma ve koruma katmanı.', 'en' => 'Full polish and protection layer after hull paint on a 42ft yacht.', 'de' => 'Komplette Politur und Schutzschicht nach Rumpflackierung bei 42ft.', 'ru' => 'Полная полировка и защитный слой после окраски корпуса 42ft.'], 'tag' => '42ft'],
    ['title' => ['tr' => 'Sezon Öncesi Refit', 'en' => 'Pre-Season Refit', 'de' => 'Refit vor der Saison', 'ru' => 'Рефит перед сезоном'], 'desc' => ['tr' => 'Yelkenli teknede güverte temizliği, teak bakım ve cila paketi.', 'en' => 'Deck cleaning, teak treatment and polish package for a sailboat.', 'de' => 'Deckreinigung, Teakpflege und Politurpaket für ein Segelboot.', 'ru' => 'Чистка палубы, обработка тика и пакет полировки для парусной лодки.'], 'tag' => 'Göcek'],
    ['title' => ['tr' => 'Komple Yüzey Hazırlığı', 'en' => 'Complete Surface Preparation', 'de' => 'Komplette Oberflächenvorbereitung', 'ru' => 'Полная подготовка поверхности'], 'desc' => ['tr' => 'Boya öncesi katman analizi, zımpara ve kusur giderme süreci.', 'en' => 'Pre-paint layer analysis, sanding and defect correction workflow.', 'de' => 'Schichtanalyse, Schleifen und Fehlerbehebung vor dem Lackieren.', 'ru' => 'Анализ слоев, шлифовка и устранение дефектов перед покраской.'], 'tag' => 'Fethiye'],
];

$testimonials = [
    ['author' => 'Marmaris / 42ft Motoryat', 'text' => ['tr' => 'Teslim süresi ve işçilik beklentimizin üstündeydi. Her aşamada fotoğrafla bilgilendirildik.', 'en' => 'Delivery timing and workmanship exceeded expectations, with photo updates at each stage.', 'de' => 'Termin und Qualität lagen über unseren Erwartungen, inklusive Fotoupdates in jeder Phase.', 'ru' => 'Сроки и качество превзошли ожидания, а на каждом этапе мы получали фотоотчеты.']],
    ['author' => 'Göcek / Yelkenli', 'text' => ['tr' => 'Sezon öncesi komple bakım paketini aldık. Teknemiz hem performans hem görünüm olarak yenilendi.', 'en' => 'We booked the pre-season full care package and the boat felt renewed in both performance and appearance.', 'de' => 'Mit dem Komplettpaket vor der Saison wirkte das Boot technisch und optisch wie erneuert.', 'ru' => 'После полного пакета перед сезоном лодка обновилась и по виду, и по состоянию.']],
    ['author' => 'Fethiye / Gulet', 'text' => ['tr' => 'Boya ve cila sonrası renk canlılığı mükemmel oldu. Ekip iletişimi çok hızlı.', 'en' => 'Color depth after paint and polish was excellent, and communication stayed fast throughout.', 'de' => 'Farbwirkung nach Lack und Politur war hervorragend, die Kommunikation sehr schnell.', 'ru' => 'Глубина цвета после покраски и полировки была отличной, связь с командой — очень быстрой.']],
];

$faqItems = [
    ['question' => ['tr' => 'İş süresi nasıl belirleniyor?', 'en' => 'How is project duration planned?', 'de' => 'Wie wird die Projektdauer geplant?', 'ru' => 'Как определяется срок работ?'], 'answer' => ['tr' => 'Keşif sonrası ihtiyaçlara göre net iş takvimi paylaşılır. Her kilometre taşı müşteriye raporlanır.', 'en' => 'After inspection we share a clear schedule and report each milestone.', 'de' => 'Nach der Analyse teilen wir einen klaren Zeitplan und berichten jeden Meilenstein.', 'ru' => 'После осмотра мы даем четкий график и отчитываемся по ключевым этапам.']],
    ['question' => ['tr' => 'Hangi hizmetleri paketleyebilirim?', 'en' => 'Which services can I combine?', 'de' => 'Welche Leistungen lassen sich kombinieren?', 'ru' => 'Какие услуги можно объединить?'], 'answer' => ['tr' => 'Bakım + boya, zımpara + cila veya komple sezonluk bakım gibi paketler oluşturabiliriz.', 'en' => 'We can combine maintenance + paint, sanding + polish, or a complete seasonal care package.', 'de' => 'Wir kombinieren z. B. Wartung + Lack, Schleifen + Politur oder saisonale Komplettpflege.', 'ru' => 'Можно объединить уход + покраску, шлифовку + полировку или полный сезонный пакет.']],
    ['question' => ['tr' => 'Garanti ve destek sunuyor musunuz?', 'en' => 'Do you provide warranty and support?', 'de' => 'Bieten Sie Garantie und Support?', 'ru' => 'Есть ли гарантия и поддержка?'], 'answer' => ['tr' => 'Evet. Teslim sonrası kontroller, bakım tavsiyeleri ve gerektiğinde hızlı destek sunuyoruz.', 'en' => 'Yes. We continue with post-delivery checks, maintenance guidance and responsive support.', 'de' => 'Ja. Wir unterstützen mit Nachkontrollen, Pflegehinweisen und schnellem Support.', 'ru' => 'Да. После сдачи мы продолжаем поддержку, проверки и даем рекомендации по уходу.']],
];

$translations = [
    'tr' => [
        'meta_title' => 'FM Marina | Premium Tekne Bakım & Onarım',
        'meta_description' => 'FM Marina – tekne bakım, onarım, boya, zımpara, cila ve hızlı teklif süreçleri.',
        'brand_line' => 'Tekneniz emin ellerde.',
        'subtitle' => 'Premium Tekne Bakım • Onarım • Boya • Cila',
        'hero_primary' => 'WhatsApp’tan Yaz',
        'hero_secondary' => 'Hizmetleri Keşfet',
        'hero_quote' => 'Hızlı Teklif Oluştur',
        'quick_services' => 'Hizmetler', 'quick_process' => 'Süreç', 'quick_pricing' => 'Fiyatlandırma', 'quick_contact' => 'İletişim',
        'badge_1' => '⚓ Marina standartlarında profesyonel işçilik',
        'badge_2' => '✅ Şeffaf planlama, hızlı teslim, görünür süreç',
        'badge_3' => '💬 Fotoğraf ve video ile düzenli ilerleme güncellemesi',
        'stats_title' => 'Neden FM Marina?',
        'services_title' => 'Hizmetlerimiz',
        'process_title' => 'Çalışma Sürecimiz',
        'pricing_title' => 'Hızlı Fiyat Hesaplama',
        'pricing_desc' => 'Teknenizin boyunu ve paketi seçin, başlangıç seviyesinde bir yaklaşık bütçe görün.',
        'boat_size' => 'Tekne Boyu (metre)',
        'package' => 'Paket',
        'estimate_title' => 'Tahmini başlangıç fiyatı',
        'estimate_note' => 'Kesin fiyat keşif sonrası belirlenir.',
        'projects_title' => 'Öne Çıkan Projeler',
        'testimonial_title' => 'Müşteri Yorumları',
        'before_after_title' => 'Önce / Sonra',
        'before_label' => 'Önce', 'after_label' => 'Sonra',
        'lead_title' => 'Kısa Brief Bırakın',
        'lead_desc' => 'İhtiyacınızı birkaç alanla özetleyin; mesajınız WhatsApp için hazır hale gelsin.',
        'lead_name' => 'Adınız', 'lead_boat' => 'Tekne tipi / boyu', 'lead_service' => 'İhtiyaç duyulan hizmet', 'lead_timeline' => 'Hedef teslim tarihi', 'lead_notes' => 'Notlar',
        'lead_submit' => 'WhatsApp Taslağı Hazırla', 'lead_helper' => 'Form verileri tarayıcıda işlenir ve doğrudan WhatsApp mesajına dönüştürülür.',
        'insta_title' => 'Instagram’dan Son Paylaşımlar', 'insta_fallback' => 'Statik örnek akış gösteriliyor.',
        'contact_title' => 'Hızlı İletişim', 'contact_phone_title' => 'Telefon / WhatsApp', 'contact_phone_text' => 'Proje detaylarınızı paylaşın, aynı gün geri dönüş sağlayalım.', 'contact_mail_title' => 'E-posta', 'contact_mail_text' => 'Fotoğraf, ölçü ve teknik bilgi içeren talepler için.', 'contact_schedule_title' => 'Çalışma Planı', 'contact_schedule_text' => 'Pazartesi - Cumartesi • 08:00 - 19:00 aktif operasyon.',
        'faq_title' => 'Sık Sorulan Sorular',
        'cta_title' => 'Teklif Alın, Planınızı Netleştirelim', 'cta_text' => 'Bugün ' . $todayLabel . ' itibarıyla yeni proje taleplerini almaya devam ediyoruz.', 'cta_button' => 'Hemen Yaz',
        'footer_text' => '© ' . $currentYear . ' FM Marina',
        'sticky_text' => 'FM Marina • Premium Tekne Servisi',
        'lead_success' => 'Mesajınız hazır. WhatsApp penceresi açılacak.',
    ],
    'en' => [
        'meta_title' => 'FM Marina | Premium Boat Maintenance & Repair',
        'meta_description' => 'FM Marina – premium boat maintenance, repair, paint, sanding, polish and fast quote workflows.',
        'brand_line' => 'Your boat is in safe hands.', 'subtitle' => 'Premium Boat Maintenance • Repair • Paint • Polish', 'hero_primary' => 'Message on WhatsApp', 'hero_secondary' => 'Explore Services', 'hero_quote' => 'Build Quick Quote', 'quick_services' => 'Services', 'quick_process' => 'Process', 'quick_pricing' => 'Pricing', 'quick_contact' => 'Contact', 'badge_1' => '⚓ Professional craftsmanship at marina standards', 'badge_2' => '✅ Transparent planning, fast delivery, visible progress', 'badge_3' => '💬 Regular updates with photos and videos', 'stats_title' => 'Why FM Marina?', 'services_title' => 'Our Services', 'process_title' => 'How We Work', 'pricing_title' => 'Quick Price Estimator', 'pricing_desc' => 'Choose your boat length and service bundle to see a starting budget range.', 'boat_size' => 'Boat Length (meters)', 'package' => 'Package', 'estimate_title' => 'Estimated starting price', 'estimate_note' => 'Final pricing is confirmed after inspection.', 'projects_title' => 'Featured Projects', 'testimonial_title' => 'Client Feedback', 'before_after_title' => 'Before / After', 'before_label' => 'Before', 'after_label' => 'After', 'lead_title' => 'Leave a Short Brief', 'lead_desc' => 'Summarize your needs in a few fields and we will turn it into a ready WhatsApp draft.', 'lead_name' => 'Your name', 'lead_boat' => 'Boat type / size', 'lead_service' => 'Required service', 'lead_timeline' => 'Target delivery date', 'lead_notes' => 'Notes', 'lead_submit' => 'Prepare WhatsApp Draft', 'lead_helper' => 'Form data is processed in the browser and converted directly into a WhatsApp message.', 'insta_title' => 'Latest Posts from Instagram', 'insta_fallback' => 'Showing the static sample feed.', 'contact_title' => 'Quick Contact', 'contact_phone_title' => 'Phone / WhatsApp', 'contact_phone_text' => 'Share project details and receive a same-day response.', 'contact_mail_title' => 'E-mail', 'contact_mail_text' => 'For requests with photos, measurements and technical notes.', 'contact_schedule_title' => 'Working Schedule', 'contact_schedule_text' => 'Monday - Saturday • 08:00 - 19:00 active operations.', 'faq_title' => 'Frequently Asked Questions', 'cta_title' => 'Get a Quote and Clarify the Plan', 'cta_text' => 'As of ' . date('F j, Y') . ' we are still accepting new project requests.', 'cta_button' => 'Write Now', 'footer_text' => '© ' . $currentYear . ' FM Marina', 'sticky_text' => 'FM Marina • Premium Boat Care', 'lead_success' => 'Your message is ready. WhatsApp will open.'
    ],
    'de' => [
        'meta_title' => 'FM Marina | Premium Bootswartung & Reparatur',
        'meta_description' => 'FM Marina – Premium-Bootswartung, Reparatur, Lack, Schleifen, Politur und schnelle Angebotswege.',
        'brand_line' => 'Ihr Boot ist in sicheren Händen.', 'subtitle' => 'Premium Bootswartung • Reparatur • Lackierung • Politur', 'hero_primary' => 'Per WhatsApp schreiben', 'hero_secondary' => 'Leistungen entdecken', 'hero_quote' => 'Schnellangebot erstellen', 'quick_services' => 'Leistungen', 'quick_process' => 'Ablauf', 'quick_pricing' => 'Preise', 'quick_contact' => 'Kontakt', 'badge_1' => '⚓ Professionelle Arbeit nach Marina-Standard', 'badge_2' => '✅ Transparente Planung, schnelle Lieferung, sichtbarer Fortschritt', 'badge_3' => '💬 Regelmäßige Updates mit Fotos und Videos', 'stats_title' => 'Warum FM Marina?', 'services_title' => 'Unsere Leistungen', 'process_title' => 'Unser Ablauf', 'pricing_title' => 'Schneller Preisrechner', 'pricing_desc' => 'Bootslänge und Paket wählen, um einen ersten Budgetrahmen zu sehen.', 'boat_size' => 'Bootslänge (Meter)', 'package' => 'Paket', 'estimate_title' => 'Geschätzter Startpreis', 'estimate_note' => 'Der Endpreis wird nach der Analyse bestätigt.', 'projects_title' => 'Ausgewählte Projekte', 'testimonial_title' => 'Kundenstimmen', 'before_after_title' => 'Vorher / Nachher', 'before_label' => 'Vorher', 'after_label' => 'Nachher', 'lead_title' => 'Kurzes Briefing senden', 'lead_desc' => 'Fassen Sie Ihren Bedarf kurz zusammen; wir bereiten daraus einen WhatsApp-Entwurf vor.', 'lead_name' => 'Ihr Name', 'lead_boat' => 'Bootstyp / Größe', 'lead_service' => 'Gewünschte Leistung', 'lead_timeline' => 'Geplanter Übergabetermin', 'lead_notes' => 'Notizen', 'lead_submit' => 'WhatsApp-Entwurf vorbereiten', 'lead_helper' => 'Die Formulardaten werden im Browser verarbeitet und direkt in eine WhatsApp-Nachricht umgewandelt.', 'insta_title' => 'Neueste Instagram-Beiträge', 'insta_fallback' => 'Es wird der statische Beispiel-Feed angezeigt.', 'contact_title' => 'Schneller Kontakt', 'contact_phone_title' => 'Telefon / WhatsApp', 'contact_phone_text' => 'Teilen Sie Ihre Projektdetails und erhalten Sie noch am selben Tag eine Rückmeldung.', 'contact_mail_title' => 'E-Mail', 'contact_mail_text' => 'Für Anfragen mit Fotos, Maßen und technischen Infos.', 'contact_schedule_title' => 'Arbeitszeiten', 'contact_schedule_text' => 'Montag - Samstag • 08:00 - 19:00 aktiver Betrieb.', 'faq_title' => 'Häufige Fragen', 'cta_title' => 'Angebot erhalten und Plan klären', 'cta_text' => 'Stand ' . date('d.m.Y') . ' nehmen wir weiterhin neue Projektanfragen an.', 'cta_button' => 'Jetzt schreiben', 'footer_text' => '© ' . $currentYear . ' FM Marina', 'sticky_text' => 'FM Marina • Premium Boot Service', 'lead_success' => 'Ihre Nachricht ist bereit. WhatsApp wird geöffnet.'
    ],
    'ru' => [
        'meta_title' => 'FM Marina | Премиум обслуживание и ремонт лодок',
        'meta_description' => 'FM Marina — премиум-обслуживание лодок, ремонт, покраска, шлифовка, полировка и быстрые запросы на расчет.',
        'brand_line' => 'Ваша лодка в надежных руках.', 'subtitle' => 'Премиум обслуживание • Ремонт • Покраска • Полировка', 'hero_primary' => 'Написать в WhatsApp', 'hero_secondary' => 'Посмотреть услуги', 'hero_quote' => 'Собрать быстрый запрос', 'quick_services' => 'Услуги', 'quick_process' => 'Процесс', 'quick_pricing' => 'Стоимость', 'quick_contact' => 'Контакты', 'badge_1' => '⚓ Профессиональная работа по стандартам марины', 'badge_2' => '✅ Прозрачное планирование, быстрые сроки, понятный процесс', 'badge_3' => '💬 Регулярные фото- и видеообновления', 'stats_title' => 'Почему FM Marina?', 'services_title' => 'Наши услуги', 'process_title' => 'Как мы работаем', 'pricing_title' => 'Быстрый расчет стоимости', 'pricing_desc' => 'Выберите длину лодки и пакет услуг, чтобы увидеть стартовый бюджет.', 'boat_size' => 'Длина лодки (метры)', 'package' => 'Пакет', 'estimate_title' => 'Ориентировочная стартовая цена', 'estimate_note' => 'Точная цена подтверждается после осмотра.', 'projects_title' => 'Избранные проекты', 'testimonial_title' => 'Отзывы клиентов', 'before_after_title' => 'До / После', 'before_label' => 'До', 'after_label' => 'После', 'lead_title' => 'Оставьте короткий бриф', 'lead_desc' => 'Кратко опишите задачу, и мы превратим ее в готовое сообщение для WhatsApp.', 'lead_name' => 'Ваше имя', 'lead_boat' => 'Тип / размер лодки', 'lead_service' => 'Нужная услуга', 'lead_timeline' => 'Желаемая дата сдачи', 'lead_notes' => 'Примечания', 'lead_submit' => 'Подготовить сообщение для WhatsApp', 'lead_helper' => 'Данные формы обрабатываются в браузере и сразу превращаются в сообщение WhatsApp.', 'insta_title' => 'Последние публикации Instagram', 'insta_fallback' => 'Показываем статический пример ленты.', 'contact_title' => 'Быстрый контакт', 'contact_phone_title' => 'Телефон / WhatsApp', 'contact_phone_text' => 'Отправьте детали проекта и получите ответ в тот же день.', 'contact_mail_title' => 'E-mail', 'contact_mail_text' => 'Для заявок с фото, размерами и техническими данными.', 'contact_schedule_title' => 'График работы', 'contact_schedule_text' => 'Понедельник - Суббота • 08:00 - 19:00 активная работа.', 'faq_title' => 'Частые вопросы', 'cta_title' => 'Получите расчет и согласуйте план', 'cta_text' => 'По состоянию на ' . date('d.m.Y') . ' мы продолжаем принимать новые проекты.', 'cta_button' => 'Написать сейчас', 'footer_text' => '© ' . $currentYear . ' FM Marina', 'sticky_text' => 'FM Marina • Премиум сервис лодок', 'lead_success' => 'Сообщение готово. Откроется WhatsApp.'
    ],
];

$instagramFeed = [];
$instagramPath = __DIR__ . '/instagram-feed.json';
if (is_file($instagramPath)) {
    $payload = json_decode((string) file_get_contents($instagramPath), true);
    $rows = is_array($payload) ? ($payload['data'] ?? $payload) : [];
    if (is_array($rows)) {
        foreach ($rows as $item) {
            $instagramFeed[] = [
                'caption' => $item['caption'] ?? '',
                'media_url' => $item['media_url'] ?? ($item['thumbnail_url'] ?? ''),
                'thumbnail_url' => $item['thumbnail_url'] ?? ($item['media_url'] ?? ''),
                'permalink' => $item['permalink'] ?? $instagramProfile,
                'media_type' => $item['media_type'] ?? 'IMAGE',
            ];
        }
    }
}
?><!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= htmlspecialchars($translations[$defaultLang]['meta_title']) ?></title>
  <meta name="description" content="<?= htmlspecialchars($translations[$defaultLang]['meta_description']) ?>" />
  <style>
    :root {
      --bg: #041322;
      --bg-soft: #0b2742;
      --card: #0f2f4b;
      --card-soft: #194c74;
      --accent: #8ddcff;
      --accent-2: #5cbdf6;
      --text: #f4fbff;
      --muted: #bad8ee;
      --wa: #25D366;
      --border: rgba(140, 209, 255, 0.28);
      --shadow: 0 16px 34px rgba(0, 0, 0, 0.34);
      --radius: 18px;
      --warning: #ffd27d;
    }
    * { box-sizing: border-box; margin: 0; padding: 0; }
    html { scroll-behavior: smooth; }
    body {
      font-family: "Inter", "Segoe UI", Arial, sans-serif;
      color: var(--text);
      line-height: 1.6;
      background:
        radial-gradient(circle at 20% -10%, #1b567f 0, transparent 34%),
        radial-gradient(circle at 85% 0%, #0f395a 0, transparent 28%),
        linear-gradient(180deg, #06192b 0%, #041322 100%);
      overflow-x: hidden;
    }
    a { color: inherit; text-decoration: none; }
    .sticky {
      position: fixed; top: 0; inset-inline: 0; display: none; align-items: center; justify-content: center; gap: 10px;
      padding: 10px 16px; background: rgba(4, 19, 34, 0.8); border-bottom: 1px solid var(--border); backdrop-filter: blur(10px); z-index: 999;
    }
    .sticky img { width: 42px; height: 42px; object-fit: contain; }
    .sticky span { font-size: 13px; color: var(--muted); }
    header {
      min-height: 96vh; padding: 24px 20px 80px;
      background: linear-gradient(rgba(4, 19, 34, 0.72), rgba(4, 19, 34, 0.92)), url("bg.png") center/cover no-repeat;
      display: flex; flex-direction: column; justify-content: space-between; border-bottom: 1px solid var(--border);
    }
    .topbar, .hero, section, .cta { width: min(1120px, 100%); margin-inline: auto; }
    .topbar { display: flex; justify-content: space-between; align-items: center; gap: 14px; }
    .brand { display: flex; align-items: center; gap: 12px; }
    .brand img { width: 68px; height: 68px; }
    .brand-copy p:first-child { font-weight: 700; letter-spacing: 1.2px; }
    .brand-copy small { color: var(--muted); }
    .lang-switch { display: flex; gap: 8px; flex-wrap: wrap; justify-content: flex-end; }
    .lang-switch button {
      border: 1px solid rgba(255,255,255,.4); background: rgba(255,255,255,.08); color: var(--text); padding: 6px 11px; border-radius: 999px; font-size: 12px; cursor: pointer; transition: .2s;
    }
    .lang-switch button.active, .lang-switch button:hover { background: var(--accent); border-color: var(--accent); color: #072238; }
    .hero { text-align: center; margin-top: 24px; padding-top: 26px; }
    h1 { font-size: clamp(38px, 8vw, 70px); letter-spacing: 2px; }
    .hero-subtitle { margin-top: 10px; font-size: clamp(18px, 2.3vw, 25px); color: var(--muted); }
    .hero-slogan { display: block; margin-top: 10px; font-style: italic; opacity: .9; }
    .hero-actions, .quick-links { display: flex; justify-content: center; gap: 12px; flex-wrap: wrap; }
    .hero-actions { margin-top: 30px; }
    .quick-links { margin-top: 18px; }
    .quick-links a {
      border: 1px solid rgba(255,255,255,.26); background: rgba(5,24,40,.6); border-radius: 999px; padding: 8px 14px; font-size: 13px; color: var(--muted); transition: .2s;
    }
    .quick-links a:hover { color: var(--text); border-color: var(--accent); transform: translateY(-2px); }
    .btn {
      display: inline-flex; align-items: center; justify-content: center; border-radius: 999px; font-weight: 700; padding: 13px 24px; border: 1px solid transparent; transition: .25s; cursor: pointer;
    }
    .btn:hover { transform: translateY(-2px); }
    .btn.primary { background: var(--wa); color: #fff; }
    .btn.secondary { background: rgba(255,255,255,.07); border-color: rgba(255,255,255,.42); }
    .btn.accent { background: linear-gradient(135deg, var(--accent), var(--accent-2)); color: #072137; }
    .badges, .stats, .services, .process, .project-grid, .contact-grid, .faq-grid, .insta-grid, .lead-grid { display: grid; gap: 16px; }
    .badges { margin-top: 32px; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); }
    .badge, .panel, .card, .stat, .step, .project-card, .insta-card, .contact-card, .faq-item {
      background: linear-gradient(180deg, var(--card-soft), var(--card)); border: 1px solid var(--border); border-radius: var(--radius); box-shadow: var(--shadow);
    }
    .badge { padding: 12px; color: var(--muted); font-size: 14px; }
    section { padding: 78px 20px; }
    h2 { text-align: center; color: var(--accent); margin-bottom: 10px; font-size: clamp(28px, 4vw, 36px); }
    .section-desc { text-align: center; color: var(--muted); max-width: 760px; margin: 0 auto 24px; }
    .stats { grid-template-columns: repeat(auto-fit, minmax(190px, 1fr)); }
    .stat { text-align: center; padding: 22px 12px; }
    .stat strong { font-size: 30px; display: block; margin-bottom: 3px; }
    .stat span { color: var(--muted); font-size: 14px; }
    .services { grid-template-columns: repeat(auto-fit, minmax(230px, 1fr)); }
    .card { position: relative; overflow: hidden; padding: 24px; cursor: pointer; transition: transform .25s; }
    .card:hover, .project-card:hover { transform: translateY(-4px); }
    .card::after, .project-card::after {
      content: ""; position: absolute; inset: 0; background: linear-gradient(110deg, transparent, rgba(141,220,255,.16), transparent); opacity: 0; transition: .3s;
    }
    .card:hover::after, .project-card:hover::after { opacity: 1; }
    .eyebrow { color: var(--accent); font-size: 12px; text-transform: uppercase; letter-spacing: 1px; }
    .card strong, .project-card strong { display: block; font-size: 20px; margin: 8px 0 6px; }
    .card p, .project-card p, .faq-item p, .contact-card p, .insta-card p { color: var(--muted); font-size: 14px; }
    .feature-list { display: grid; gap: 8px; margin-top: 14px; }
    .feature-list li { color: var(--muted); margin-left: 18px; font-size: 13px; }
    .process { grid-template-columns: repeat(auto-fit, minmax(210px, 1fr)); margin-top: 12px; }
    .step { padding: 20px; }
    .step strong { display: block; margin-bottom: 6px; color: var(--accent); }
    .panel { padding: 24px; }
    .estimator-grid, .lead-grid { grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); }
    .field label { display: block; font-size: 13px; color: var(--muted); margin-bottom: 6px; }
    .field input, .field select, .field textarea {
      width: 100%; border-radius: 12px; border: 1px solid var(--border); background: rgba(4,19,34,.65); color: var(--text); padding: 10px 12px; font-size: 14px;
    }
    .field textarea { min-height: 132px; resize: vertical; }
    .check-list { display: grid; gap: 8px; margin-top: 16px; }
    .check-list label { display: flex; gap: 8px; align-items: center; color: var(--muted); font-size: 14px; }
    .estimator-result, .lead-result {
      margin-top: 16px; padding: 14px; border: 1px dashed var(--border); border-radius: 14px; color: var(--muted);
    }
    .estimator-result strong, .lead-result strong { display: block; color: var(--accent); font-size: 28px; margin-top: 2px; }
    .lead-grid { margin-top: 20px; }
    .lead-actions { display: flex; flex-wrap: wrap; gap: 12px; align-items: center; margin-top: 18px; }
    .helper-text { color: var(--muted); font-size: 13px; }
    .project-grid, .contact-grid, .faq-grid { grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); }
    .project-card, .contact-card, .faq-item { padding: 20px; position: relative; overflow: hidden; }
    .project-tag { display: inline-block; margin-bottom: 10px; padding: 6px 10px; border-radius: 999px; background: rgba(141,220,255,.12); color: var(--accent); font-size: 12px; }
    .testimonial-wrap { max-width: 860px; margin: 0 auto; }
    .testimonials { padding: 24px; }
    .testimonial-head { display: flex; justify-content: space-between; align-items: center; gap: 10px; margin-bottom: 12px; }
    .testimonial-nav { display: flex; gap: 8px; }
    .testimonial-nav button { border: 1px solid var(--border); border-radius: 999px; background: rgba(255,255,255,.08); color: var(--text); padding: 6px 10px; cursor: pointer; }
    .gallery { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 16px; margin-top: 12px; }
    .gallery-item {
      height: 240px; border-radius: var(--radius); display: flex; align-items: flex-end; padding: 16px; font-size: 18px; font-weight: 700; box-shadow: var(--shadow); border: 1px solid var(--border);
    }
    .before { background: linear-gradient(rgba(0,0,0,.12), rgba(0,0,0,.74)), url('https://images.unsplash.com/photo-1489515217757-5fd1be406fef?auto=format&fit=crop&w=900&q=80') center/cover no-repeat; }
    .after { background: linear-gradient(rgba(0,0,0,.12), rgba(0,0,0,.74)), url('https://images.unsplash.com/photo-1540946485063-a40da27545f8?auto=format&fit=crop&w=900&q=80') center/cover no-repeat; }
    .insta-status { text-align: center; color: var(--muted); margin-bottom: 14px; }
    .insta-grid { grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); }
    .insta-card { overflow: hidden; }
    .insta-card img { width: 100%; height: 220px; object-fit: cover; display: block; }
    .insta-card .meta { padding: 12px; }
    .insta-link, .contact-card a { display: inline-block; margin-top: 8px; color: var(--accent); font-weight: 700; font-size: 13px; }
    .cta {
      margin: 20px auto 78px; padding: 52px 20px; border-radius: 22px; text-align: center; border: 1px solid var(--border); background: linear-gradient(125deg, #0f3a5d, #0b2640); box-shadow: var(--shadow);
    }
    .cta p { color: var(--muted); }
    .cta a { margin-top: 20px; }
    footer { text-align: center; color: #98c4e3; font-size: 14px; padding: 26px 20px 80px; }
    footer img { width: 74px; margin-bottom: 10px; }
    .whatsapp-float {
      position: fixed; right: 20px; bottom: 20px; width: 58px; height: 58px; border-radius: 50%; display: flex; align-items: center; justify-content: center; background: var(--wa); color: #fff; font-size: 30px; box-shadow: 0 8px 24px rgba(0,0,0,.3); z-index: 999;
    }
    @media (max-width: 700px) {
      .brand-copy p:first-child { display: none; }
      header { min-height: 88vh; }
      .gallery-item { height: 180px; }
      .lead-actions { flex-direction: column; align-items: stretch; }
    }
  </style>
</head>
<body>
  <div class="sticky" id="sticky">
    <img src="logo.png" alt="FM Marina" />
    <span id="stickyText"><?= htmlspecialchars($translations[$defaultLang]['sticky_text']) ?></span>
  </div>

  <header>
    <div class="topbar">
      <div class="brand">
        <img src="logo.png" alt="FM Marina logo" />
        <div class="brand-copy">
          <p>FM MARINA</p>
          <small id="brandLine"><?= htmlspecialchars($translations[$defaultLang]['brand_line']) ?></small>
        </div>
      </div>
      <div class="lang-switch">
        <?php foreach ($supportedLangs as $lang): ?>
          <button class="<?= $lang === $defaultLang ? 'active' : '' ?>" data-lang="<?= $lang ?>"><?= strtoupper($lang) ?></button>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="hero">
      <h1>FM MARINA</h1>
      <p class="hero-subtitle" id="subtitle"><?= htmlspecialchars($translations[$defaultLang]['subtitle']) ?></p>
      <em class="hero-slogan" id="brandLineHero"><?= htmlspecialchars($translations[$defaultLang]['brand_line']) ?></em>

      <div class="hero-actions">
        <a href="#" class="btn primary" id="heroBtnPrimary" onclick="openWhatsApp(); return false;"><?= htmlspecialchars($translations[$defaultLang]['hero_primary']) ?></a>
        <a href="#services" class="btn secondary" id="heroBtnSecondary"><?= htmlspecialchars($translations[$defaultLang]['hero_secondary']) ?></a>
        <a href="#leadForm" class="btn accent" id="heroBtnQuote"><?= htmlspecialchars($translations[$defaultLang]['hero_quote']) ?></a>
      </div>

      <nav class="quick-links" aria-label="Bölüm kısayolları">
        <a href="#services" id="quickServices"><?= htmlspecialchars($translations[$defaultLang]['quick_services']) ?></a>
        <a href="#process" id="quickProcess"><?= htmlspecialchars($translations[$defaultLang]['quick_process']) ?></a>
        <a href="#pricing" id="quickPricing"><?= htmlspecialchars($translations[$defaultLang]['quick_pricing']) ?></a>
        <a href="#contact" id="quickContact"><?= htmlspecialchars($translations[$defaultLang]['quick_contact']) ?></a>
      </nav>

      <div class="badges">
        <div class="badge" id="badge1"><?= htmlspecialchars($translations[$defaultLang]['badge_1']) ?></div>
        <div class="badge" id="badge2"><?= htmlspecialchars($translations[$defaultLang]['badge_2']) ?></div>
        <div class="badge" id="badge3"><?= htmlspecialchars($translations[$defaultLang]['badge_3']) ?></div>
      </div>
    </div>
  </header>

  <section>
    <h2 id="statsTitle"><?= htmlspecialchars($translations[$defaultLang]['stats_title']) ?></h2>
    <div class="stats">
      <?php foreach ($metrics as $metric): ?>
        <div class="stat">
          <strong data-target="<?= preg_replace('/\D+/', '', $metric['value']) ?>" data-static="<?= preg_match('/\D/', $metric['value']) && !preg_match('/^\d+\+$/', $metric['value']) ? 'true' : 'false' ?>"><?= htmlspecialchars($metric['value']) ?></strong>
          <span data-i18n='<?= json_encode($metric['label'], JSON_UNESCAPED_UNICODE) ?>'><?= htmlspecialchars($metric['label'][$defaultLang]) ?></span>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <section id="services">
    <h2 id="servicesTitle"><?= htmlspecialchars($translations[$defaultLang]['services_title']) ?></h2>
    <div class="services">
      <?php foreach ($services as $service): ?>
        <div class="card" onclick="openServiceWA('<?= htmlspecialchars($service['key']) ?>')">
          <span class="eyebrow"><?= $service['icon'] ?> Service</span>
          <strong data-i18n='<?= json_encode($service['title'], JSON_UNESCAPED_UNICODE) ?>'><?= htmlspecialchars($service['title'][$defaultLang]) ?></strong>
          <p data-i18n='<?= json_encode($service['description'], JSON_UNESCAPED_UNICODE) ?>'><?= htmlspecialchars($service['description'][$defaultLang]) ?></p>
          <ul class="feature-list">
            <?php foreach ($service['features'] as $feature): ?>
              <li data-i18n='<?= json_encode($feature, JSON_UNESCAPED_UNICODE) ?>'><?= htmlspecialchars($feature[$defaultLang]) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <section id="process">
    <h2 id="processTitle"><?= htmlspecialchars($translations[$defaultLang]['process_title']) ?></h2>
    <div class="process">
      <?php foreach ($processSteps as $step): ?>
        <div class="step">
          <strong data-i18n='<?= json_encode(['tr' => $step['tr']['title'], 'en' => $step['en']['title'], 'de' => $step['de']['title'], 'ru' => $step['ru']['title']], JSON_UNESCAPED_UNICODE) ?>'><?= htmlspecialchars($step[$defaultLang]['title']) ?></strong>
          <p data-i18n='<?= json_encode(['tr' => $step['tr']['desc'], 'en' => $step['en']['desc'], 'de' => $step['de']['desc'], 'ru' => $step['ru']['desc']], JSON_UNESCAPED_UNICODE) ?>'><?= htmlspecialchars($step[$defaultLang]['desc']) ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <section id="pricing">
    <h2 id="pricingTitle"><?= htmlspecialchars($translations[$defaultLang]['pricing_title']) ?></h2>
    <p class="section-desc" id="pricingDesc"><?= htmlspecialchars($translations[$defaultLang]['pricing_desc']) ?></p>
    <div class="panel">
      <div class="estimator-grid">
        <div class="field">
          <label for="boatSize" id="boatSizeLabel"><?= htmlspecialchars($translations[$defaultLang]['boat_size']) ?></label>
          <input id="boatSize" type="number" min="4" max="40" value="10" />
        </div>
        <div class="field">
          <label for="serviceLevel" id="serviceLevelLabel"><?= htmlspecialchars($translations[$defaultLang]['package']) ?></label>
          <select id="serviceLevel">
            <?php foreach ($packages as $package): ?>
              <option value="<?= htmlspecialchars((string) $package['multiplier']) ?>" data-label='<?= json_encode($package['label'], JSON_UNESCAPED_UNICODE) ?>'><?= htmlspecialchars($package['label'][$defaultLang]) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="check-list">
        <?php foreach ($extraServices as $extra): ?>
          <label>
            <input type="checkbox" value="<?= (int) $extra['price'] ?>" class="extra-service" />
            <span data-template='<?= json_encode($extra['label'], JSON_UNESCAPED_UNICODE) ?>'><?= htmlspecialchars($extra['label'][$defaultLang]) ?> (+₺<?= number_format($extra['price'], 0, ',', '.') ?>)</span>
          </label>
        <?php endforeach; ?>
      </div>
      <div class="estimator-result">
        <span id="estimateTitle"><?= htmlspecialchars($translations[$defaultLang]['estimate_title']) ?></span>
        <strong id="estimateValue">₺0</strong>
        <small id="estimateNote"><?= htmlspecialchars($translations[$defaultLang]['estimate_note']) ?></small>
      </div>
    </div>
  </section>

  <section>
    <h2 id="projectsTitle"><?= htmlspecialchars($translations[$defaultLang]['projects_title']) ?></h2>
    <div class="project-grid">
      <?php foreach ($showcaseProjects as $project): ?>
        <article class="project-card">
          <span class="project-tag"><?= htmlspecialchars($project['tag']) ?></span>
          <strong data-i18n='<?= json_encode($project['title'], JSON_UNESCAPED_UNICODE) ?>'><?= htmlspecialchars($project['title'][$defaultLang]) ?></strong>
          <p data-i18n='<?= json_encode($project['desc'], JSON_UNESCAPED_UNICODE) ?>'><?= htmlspecialchars($project['desc'][$defaultLang]) ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </section>

  <section>
    <h2 id="testimonialTitle"><?= htmlspecialchars($translations[$defaultLang]['testimonial_title']) ?></h2>
    <div class="testimonial-wrap">
      <div class="panel testimonials">
        <div class="testimonial-head">
          <p id="testimonialAuthor">—</p>
          <div class="testimonial-nav">
            <button id="prevTestimonial" type="button">◀</button>
            <button id="nextTestimonial" type="button">▶</button>
          </div>
        </div>
        <p id="testimonialText">Yorum yükleniyor...</p>
      </div>
    </div>
  </section>

  <section>
    <h2 id="beforeAfterTitle"><?= htmlspecialchars($translations[$defaultLang]['before_after_title']) ?></h2>
    <div class="gallery">
      <div class="gallery-item before" id="beforeLabel"><?= htmlspecialchars($translations[$defaultLang]['before_label']) ?></div>
      <div class="gallery-item after" id="afterLabel"><?= htmlspecialchars($translations[$defaultLang]['after_label']) ?></div>
    </div>
  </section>

  <section id="leadForm">
    <h2 id="leadTitle"><?= htmlspecialchars($translations[$defaultLang]['lead_title']) ?></h2>
    <p class="section-desc" id="leadDesc"><?= htmlspecialchars($translations[$defaultLang]['lead_desc']) ?></p>
    <div class="panel">
      <div class="lead-grid">
        <div class="field"><label for="leadName" id="leadNameLabel"><?= htmlspecialchars($translations[$defaultLang]['lead_name']) ?></label><input id="leadName" type="text" placeholder="FM Marina" /></div>
        <div class="field"><label for="leadBoat" id="leadBoatLabel"><?= htmlspecialchars($translations[$defaultLang]['lead_boat']) ?></label><input id="leadBoat" type="text" placeholder="12m motoryat" /></div>
        <div class="field"><label for="leadService" id="leadServiceLabel"><?= htmlspecialchars($translations[$defaultLang]['lead_service']) ?></label><input id="leadService" type="text" placeholder="Boya + polish" /></div>
        <div class="field"><label for="leadTimeline" id="leadTimelineLabel"><?= htmlspecialchars($translations[$defaultLang]['lead_timeline']) ?></label><input id="leadTimeline" type="date" /></div>
        <div class="field" style="grid-column: 1 / -1;"><label for="leadNotes" id="leadNotesLabel"><?= htmlspecialchars($translations[$defaultLang]['lead_notes']) ?></label><textarea id="leadNotes" placeholder="Teknenin mevcut durumu, marina bilgisi, fotoğraf linki..."></textarea></div>
      </div>
      <div class="lead-actions">
        <button type="button" class="btn accent" id="leadSubmit"><?= htmlspecialchars($translations[$defaultLang]['lead_submit']) ?></button>
        <span class="helper-text" id="leadHelper"><?= htmlspecialchars($translations[$defaultLang]['lead_helper']) ?></span>
      </div>
      <div class="lead-result">
        <span id="leadStatus">WhatsApp brief taslağı</span>
        <strong id="leadPreview">—</strong>
      </div>
    </div>
  </section>

  <section>
    <h2 id="instaTitle"><?= htmlspecialchars($translations[$defaultLang]['insta_title']) ?></h2>
    <div class="insta-status" id="instaStatus"><?= htmlspecialchars($translations[$defaultLang]['insta_fallback']) ?></div>
    <div class="insta-grid" id="instaGrid">
      <?php foreach (array_slice($instagramFeed, 0, 6) as $item): ?>
        <?php $media = ($item['media_type'] ?? 'IMAGE') === 'VIDEO' ? ($item['thumbnail_url'] ?: $item['media_url']) : $item['media_url']; ?>
        <article class="insta-card">
          <img src="<?= htmlspecialchars($media) ?>" alt="Instagram paylaşımı" loading="lazy" />
          <div class="meta">
            <p><?= htmlspecialchars($item['caption']) ?></p>
            <a class="insta-link" href="<?= htmlspecialchars($item['permalink']) ?>" target="_blank" rel="noopener">Instagram</a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </section>

  <section id="contact">
    <h2 id="contactTitle"><?= htmlspecialchars($translations[$defaultLang]['contact_title']) ?></h2>
    <div class="contact-grid">
      <article class="contact-card">
        <h3 id="contactCard1Title"><?= htmlspecialchars($translations[$defaultLang]['contact_phone_title']) ?></h3>
        <p id="contactCard1Text"><?= htmlspecialchars($translations[$defaultLang]['contact_phone_text']) ?></p>
        <a href="tel:<?= htmlspecialchars($phoneDigits) ?>"><?= htmlspecialchars($phoneDisplay) ?></a>
      </article>
      <article class="contact-card">
        <h3 id="contactCard2Title"><?= htmlspecialchars($translations[$defaultLang]['contact_mail_title']) ?></h3>
        <p id="contactCard2Text"><?= htmlspecialchars($translations[$defaultLang]['contact_mail_text']) ?></p>
        <a href="mailto:<?= htmlspecialchars($email) ?>"><?= htmlspecialchars($email) ?></a>
      </article>
      <article class="contact-card">
        <h3 id="contactCard3Title"><?= htmlspecialchars($translations[$defaultLang]['contact_schedule_title']) ?></h3>
        <p id="contactCard3Text"><?= htmlspecialchars($translations[$defaultLang]['contact_schedule_text']) ?></p>
        <a href="#" onclick="openWhatsApp(); return false;">WhatsApp</a>
      </article>
    </div>
  </section>

  <section id="faq">
    <h2 id="faqTitle"><?= htmlspecialchars($translations[$defaultLang]['faq_title']) ?></h2>
    <div class="faq-grid">
      <?php foreach ($faqItems as $faq): ?>
        <article class="faq-item">
          <h3 data-i18n='<?= json_encode($faq['question'], JSON_UNESCAPED_UNICODE) ?>'><?= htmlspecialchars($faq['question'][$defaultLang]) ?></h3>
          <p data-i18n='<?= json_encode($faq['answer'], JSON_UNESCAPED_UNICODE) ?>'><?= htmlspecialchars($faq['answer'][$defaultLang]) ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="cta">
    <h2 id="ctaTitle"><?= htmlspecialchars($translations[$defaultLang]['cta_title']) ?></h2>
    <p id="ctaText"><?= htmlspecialchars($translations[$defaultLang]['cta_text']) ?></p>
    <a href="#" class="btn accent" id="ctaBtn" onclick="openWhatsApp(); return false;"><?= htmlspecialchars($translations[$defaultLang]['cta_button']) ?></a>
  </section>

  <footer>
    <img src="logo.png" alt="FM Marina" loading="lazy" />
    <p id="footerText"><?= htmlspecialchars($translations[$defaultLang]['footer_text']) ?></p>
  </footer>

  <a href="#" onclick="openWhatsApp(); return false;" class="whatsapp-float" aria-label="WhatsApp">💬</a>

  <script>
    const phoneDigits = <?= json_encode($phoneDigits) ?>;
    const currentYear = <?= json_encode($currentYear) ?>;
    const translations = <?= json_encode($translations, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
    const testimonials = <?= json_encode($testimonials, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
    const instagramItems = <?= json_encode($instagramFeed, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
    const extraPriceLabels = document.querySelectorAll('[data-template]');
    let currentLang = '<?= $defaultLang ?>';
    let testimonialIndex = 0;

    const serviceMessages = {
      maintenance: { tr: 'Tekne bakım ve onarım hizmeti hakkında bilgi almak istiyorum.', en: 'I would like information about boat maintenance and repair.', de: 'Ich möchte Informationen zur Bootswartung erhalten.', ru: 'Хочу получить информацию по обслуживанию лодки.' },
      paint: { tr: 'Tekne boya hizmeti hakkında bilgi almak istiyorum.', en: 'I would like information about boat painting services.', de: 'Ich möchte Informationen zu Lackierarbeiten erhalten.', ru: 'Хочу получить информацию о покраске лодки.' },
      surface: { tr: 'Zımpara ve yüzey hazırlığı hakkında bilgi almak istiyorum.', en: 'I would like information about sanding and surface preparation.', de: 'Ich möchte Informationen zur Oberflächenvorbereitung erhalten.', ru: 'Хочу получить информацию о шлифовке и подготовке поверхности.' },
      polish: { tr: 'Cila ve polish hizmeti hakkında bilgi almak istiyorum.', en: 'I would like information about polishing and detailing.', de: 'Ich möchte Informationen zur Politur erhalten.', ru: 'Хочу получить информацию о полировке.' }
    };

    function translateMappedNodes() {
      document.querySelectorAll('[data-i18n]').forEach((el) => {
        const values = JSON.parse(el.getAttribute('data-i18n'));
        if (values[currentLang]) el.textContent = values[currentLang];
      });
      document.querySelectorAll('#serviceLevel option').forEach((option) => {
        const labels = JSON.parse(option.dataset.label);
        option.textContent = labels[currentLang] || option.textContent;
      });
      extraPriceLabels.forEach((span) => {
        const labels = JSON.parse(span.dataset.template);
        const input = span.previousElementSibling;
        const amount = Number(input?.value || 0).toLocaleString('tr-TR');
        span.textContent = `${labels[currentLang] || ''} (+₺${amount})`;
      });
      document.querySelectorAll('.insta-link').forEach((link) => { link.textContent = 'Instagram'; });
    }

    function setLang(lang) {
      currentLang = translations[lang] ? lang : '<?= $defaultLang ?>';
      document.querySelectorAll('.lang-switch button').forEach((button) => button.classList.toggle('active', button.dataset.lang === currentLang));
      const ids = {
        subtitle: 'subtitle', brandLine: 'brand_line', brandLineHero: 'brand_line', heroBtnPrimary: 'hero_primary', heroBtnSecondary: 'hero_secondary', heroBtnQuote: 'hero_quote', quickServices: 'quick_services', quickProcess: 'quick_process', quickPricing: 'quick_pricing', quickContact: 'quick_contact', badge1: 'badge_1', badge2: 'badge_2', badge3: 'badge_3', statsTitle: 'stats_title', servicesTitle: 'services_title', processTitle: 'process_title', pricingTitle: 'pricing_title', pricingDesc: 'pricing_desc', boatSizeLabel: 'boat_size', serviceLevelLabel: 'package', estimateTitle: 'estimate_title', estimateNote: 'estimate_note', projectsTitle: 'projects_title', testimonialTitle: 'testimonial_title', beforeAfterTitle: 'before_after_title', beforeLabel: 'before_label', afterLabel: 'after_label', leadTitle: 'lead_title', leadDesc: 'lead_desc', leadNameLabel: 'lead_name', leadBoatLabel: 'lead_boat', leadServiceLabel: 'lead_service', leadTimelineLabel: 'lead_timeline', leadNotesLabel: 'lead_notes', leadSubmit: 'lead_submit', leadHelper: 'lead_helper', instaTitle: 'insta_title', instaStatus: 'insta_fallback', contactTitle: 'contact_title', contactCard1Title: 'contact_phone_title', contactCard1Text: 'contact_phone_text', contactCard2Title: 'contact_mail_title', contactCard2Text: 'contact_mail_text', contactCard3Title: 'contact_schedule_title', contactCard3Text: 'contact_schedule_text', faqTitle: 'faq_title', ctaTitle: 'cta_title', ctaText: 'cta_text', ctaBtn: 'cta_button', footerText: 'footer_text', stickyText: 'sticky_text'
      };
      Object.entries(ids).forEach(([id, key]) => {
        const el = document.getElementById(id);
        if (el && translations[currentLang][key]) el.textContent = translations[currentLang][key];
      });
      translateMappedNodes();
      showTestimonial(testimonialIndex);
      updateLeadPreview();
    }

    function openWhatsApp(message) {
      const defaults = {
        tr: 'Merhaba, teknem için bakım ve onarım hizmeti hakkında bilgi almak istiyorum.',
        en: 'Hello, I would like information about boat maintenance and repair services.',
        de: 'Hallo, ich möchte Informationen zu Bootsservice und Wartung erhalten.',
        ru: 'Здравствуйте, хочу получить информацию об обслуживании и ремонте лодки.'
      };
      const msg = encodeURIComponent(message || defaults[currentLang]);
      window.open(`https://wa.me/${phoneDigits}?text=${msg}`, '_blank');
    }

    function openServiceWA(service) {
      openWhatsApp(serviceMessages[service]?.[currentLang]);
    }

    function showTestimonial(index) {
      const safeIndex = (index + testimonials.length) % testimonials.length;
      testimonialIndex = safeIndex;
      const item = testimonials[safeIndex];
      document.getElementById('testimonialAuthor').textContent = item.author;
      document.getElementById('testimonialText').textContent = `“${item.text[currentLang] || item.text.tr}”`;
    }

    function initEstimator() {
      const sizeInput = document.getElementById('boatSize');
      const levelInput = document.getElementById('serviceLevel');
      const output = document.getElementById('estimateValue');
      const extras = Array.from(document.querySelectorAll('.extra-service'));
      const calculate = () => {
        const size = Number(sizeInput.value) || 0;
        const level = Number(levelInput.value) || 1;
        const extra = extras.filter((el) => el.checked).reduce((sum, el) => sum + Number(el.value || 0), 0);
        const base = size * 8500 * level + extra;
        output.textContent = new Intl.NumberFormat('tr-TR', { style: 'currency', currency: 'TRY', maximumFractionDigits: 0 }).format(base);
      };
      sizeInput.addEventListener('input', calculate);
      levelInput.addEventListener('change', calculate);
      extras.forEach((el) => el.addEventListener('change', calculate));
      calculate();
    }

    function animateStats() {
      const numbers = Array.from(document.querySelectorAll('.stat strong[data-target]'));
      numbers.forEach((el) => {
        if (el.dataset.static === 'true') return;
        const target = Number(el.dataset.target || 0);
        let current = 0;
        const suffix = el.textContent.includes('+') ? '+' : '';
        const step = Math.max(1, Math.ceil(target / 30));
        const timer = setInterval(() => {
          current += step;
          if (current >= target) {
            current = target;
            clearInterval(timer);
          }
          el.textContent = `${current}${suffix}`;
        }, 35);
      });
    }

    function updateLeadPreview() {
      const values = {
        name: document.getElementById('leadName').value.trim() || '—',
        boat: document.getElementById('leadBoat').value.trim() || '—',
        service: document.getElementById('leadService').value.trim() || '—',
        timeline: document.getElementById('leadTimeline').value || '—',
        notes: document.getElementById('leadNotes').value.trim() || '—'
      };
      document.getElementById('leadPreview').textContent = `${values.name} • ${values.boat} • ${values.service}`;
      return values;
    }

    function submitLead() {
      const values = updateLeadPreview();
      const labels = {
        tr: ['Ad', 'Tekne', 'Hizmet', 'Teslim', 'Not'],
        en: ['Name', 'Boat', 'Service', 'Target', 'Notes'],
        de: ['Name', 'Boot', 'Leistung', 'Termin', 'Notiz'],
        ru: ['Имя', 'Лодка', 'Услуга', 'Срок', 'Примечание']
      };
      const [nameL, boatL, serviceL, timeL, noteL] = labels[currentLang];
      const message = `${translations[currentLang].lead_success}\n${nameL}: ${values.name}\n${boatL}: ${values.boat}\n${serviceL}: ${values.service}\n${timeL}: ${values.timeline}\n${noteL}: ${values.notes}`;
      openWhatsApp(message);
    }

    function initLeadForm() {
      ['leadName', 'leadBoat', 'leadService', 'leadTimeline', 'leadNotes'].forEach((id) => document.getElementById(id).addEventListener('input', updateLeadPreview));
      document.getElementById('leadSubmit').addEventListener('click', submitLead);
      updateLeadPreview();
    }

    function initDynamicSections() {
      initEstimator();
      initLeadForm();
      showTestimonial(0);
      document.getElementById('prevTestimonial').addEventListener('click', () => showTestimonial(testimonialIndex - 1));
      document.getElementById('nextTestimonial').addEventListener('click', () => showTestimonial(testimonialIndex + 1));
      setInterval(() => showTestimonial(testimonialIndex + 1), 5000);
      const statsSection = document.querySelector('.stats');
      const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting) {
          animateStats();
          observer.disconnect();
        }
      }, { threshold: 0.5 });
      observer.observe(statsSection);
    }

    document.querySelectorAll('.lang-switch button').forEach((button) => button.addEventListener('click', () => setLang(button.dataset.lang)));
    const sticky = document.getElementById('sticky');
    window.addEventListener('scroll', () => { sticky.style.display = window.scrollY > 180 ? 'flex' : 'none'; });

    setLang(currentLang);
    initDynamicSections();
  </script>
</body>
</html>
