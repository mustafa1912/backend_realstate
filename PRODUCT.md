# PRODUCT.md — Dar Al Omran Real Estate Admin Dashboard

## Product & Audience
- **Product**: Internal real-estate portfolio, leasing, tenant/owner CRM, invoicing, and maintenance admin dashboard for **Dar Al Omran Real Estate** (`دار العمران للاستثمار العقاري`).
- **Users**: Property managers, leasing agents, finance officers, and system administrators operating daily in Arabic (RTL default) and English (LTR switch).
- **Emotional Goal**: Quiet architectural luxury paired with operational clarity — feels unmistakably unified with `https://daralomran-realestate.vercel.app/` while staying fast, scannable, and high-contrast for daily administrative work.

## Stack & Constraints
- **Platform**: Laravel (PHP) Blade views using static Metronic 4 / Bootstrap 3 assets under `public/orbscope/admin/assets/` (with `-rtl` variants via `GetLangAdds()`).
- **Hard Constraints**:
  - Do NOT modify controllers, routes, models, migrations, database records, settings keys, form field `name`/`id` attributes, validation, or existing JS behavior.
  - Override styling via one token-driven stylesheet (`public/css/daralomran-theme.css`) loaded after vendor CSS — never edit vendor CSS files.
  - Bilingual RTL (Arabic default) & LTR (English) using CSS logical properties (`margin-inline-start`, `padding-inline-end`, `inset-inline-start`, `border-inline-start`).
  - Complete UI rebrand: replace every visible `"اكسبرس للعقارات"` / `"Express"` / `"عقاراتي"` / `"OrbScope Co."` display string with `"دار العمران"` (AR) / `"Dar Al Omran"` (EN) using translation files.
  - Official Dar Al Omran emblem stored in `public/images/brand/` (`logo.png`, `logo-light.png`, `favicon.png`, `favicon.ico`).

## User Journey (Admin Workflow)
1. **First 3 seconds (Auth / Dashboard Entry)**: Deep midnight navy (`#07101b`) frame crowned with a `2px` antique gold (`#b38734`) bar, crisp white Dar Al Omran emblem, and immediate portfolio telemetry (KPI cards + featured dark-navy financial summary cards).
2. **Navigation & Scanning**: Left/right navy sidebar with gold icons and gold start-edge active indicator; warm ivory (`#fbf9f5`) workspace with white `16px`-radius cards and gold eyebrow headings.
3. **Action & Data Entry**: Clean white inputs (`10–12px` radius, gold focus ring, gold `*` required indicators), styled dashed file-upload boxes, and gold primary CTAs (`#b38734` with `#07101b` text).
4. **Exit & Persistence**: Bilingual footer branding (`دار العمران للاستثمار العقاري` / `Dar Al Omran Real Estate`), consistent DataTables/modals/alerts with zero legacy cyan/teal leaks.

## Definition of Done
- Live browser verification and screenshots in both Arabic (RTL) and English (LTR) across `/admin`, `/admin/customer/create`, an index/list page (`/admin/customer`), and `/admin/login` (plus mobile responsive check).
- Visual parity confirmed against `https://daralomran-realestate.vercel.app/` with WCAG AA contrast on all text/background pairings.
