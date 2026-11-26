# DESIGN.md — Dar Al Omran Design System (Locked Tokens)

Source of truth: computed styles extracted live from `https://daralomran-realestate.vercel.app/`.

## Aesthetic Direction & Strategy
- **Aesthetic Name**: *Quiet Architectural Luxury (Hybrid Navy & Ivory)*
- **Color Strategy**: **Duotone / Split + Antique Gold Signal** — Deep midnight navy (`#07101b`) navigation chrome & featured financial panels paired with a warm ivory canvas (`#fbf9f5`) and crisp white (`#ffffff`) cards, unified by signature antique gold (`#b38734`) accents.
- **Dials**: `Variance: Low-Mid | Motion: Low (150–250ms functional micro-interactions, reduced-motion compliant) | Density: Mid-High (executive dashboard clarity)`
- **Differentiation Anchor**: The `2px` antique gold crown hairline on deep `#07101b` navy chrome + editorial eyebrow-with-gold-rule page headers + dark navy glass financial KPI cards with metallic gold numerals against warm `#fbf9f5` ivory.

## Exact Color Tokens
```css
:root {
  --dao-navy:           #07101b;
  --dao-navy-elevated:  #0d1826;
  --dao-navy-panel:     #09131f;
  --dao-navy-hover:     #122236;
  --dao-gold:           #b38734;
  --dao-gold-light:     #d4b380;
  --dao-gold-shimmer:   #e0c498;
  --dao-gold-dark:      #8c6620; /* WCAG AA >= 4.5:1 on white/ivory for small text */
  --dao-gold-soft:      rgba(179, 135, 52, 0.12);
  --dao-gold-border:    rgba(179, 135, 52, 0.30);
  --dao-cream:          #fbf9f5;
  --dao-parchment:      #ebe8e0;
  --dao-surface:        #ffffff;
  --dao-border:         rgba(229, 231, 235, 0.90);
  --dao-border-strong:  #d1d5dc;
  --dao-ink:            #07101b;
  --dao-ink-900:        #101828;
  --dao-ink-body:       rgba(7, 16, 27, 0.78);
  --dao-ink-muted:      #6a7282;
  --dao-on-dark:        #ffffff;
  --dao-on-dark-muted:  rgba(255, 255, 255, 0.68);
  --dao-on-dark-subtle: rgba(255, 255, 255, 0.42);
  --dao-success:        #059669;
  --dao-success-soft:   #ecfdf5;
  --dao-warning:        #ea580c;
  --dao-warning-soft:   #fff7ed;
  --dao-danger:         #dc2626;
  --dao-danger-soft:    #fef2f2;
  --dao-info:           #1e3a5f;
  --dao-info-soft:      #eff6ff;
}
```

### Contrast Verification (WCAG 2.2 AA)
- `#07101b` on `#ffffff` / `#fbf9f5` → >17:1 (AAA)
- `#6a7282` on `#ffffff` → 4.8:1 (AA)
- `#ffffff` on `#07101b` / `#0d1826` → >17:1 (AAA)
- `#07101b` on `#b38734` (gold primary CTA button) → 6.4:1 (AA+)
- `#b38734` on `#07101b` (gold icons/numbers on dark navy) → 6.4:1 (AA+)
- `#8c6620` (`--dao-gold-dark`) for small gold labels/links on `#ffffff`/`#fbf9f5` → 5.1:1 (AA) — reserving `#b38734` on light backgrounds strictly for large display text, icons, and decorative borders/dividers.

## Typography
- **Google Fonts**: `Playfair Display` (400–700, normal & italic), `Inter` (300–700), `Cairo` (400–700), `Alexandria` (300–700) with `display=swap`.
- **English (LTR)**: Display/Headings = `'Playfair Display', Georgia, serif`; Body/UI = `'Inter', system-ui, sans-serif`.
- **Arabic (RTL)**: Display/Headings = `'Cairo', Georgia, serif`; Body/UI = `'Alexandria', 'Cairo', system-ui, sans-serif`; `letter-spacing: normal !important` on Arabic text to preserve cursive shaping.

## Geometry, Elevation & Spacing
- **Spacing Scale**: `4 / 8 / 12 / 16 / 20 / 24 / 32 / 48 px`
- **Radii**: Cards/Panels `16px`, Inputs `10px`, Primary Buttons `10px`, Small Action/Nav Buttons `8px`, Language Pill `6px`, Badges `9999px` (or `6px` status tags).
- **Shadows**:
  - Card default: `0 1px 3px 0 rgba(7, 16, 27, 0.06), 0 1px 2px -1px rgba(7, 16, 27, 0.06)`
  - Card hover: `0 16px 32px -8px rgba(7, 16, 27, 0.12), 0 6px 12px -6px rgba(7, 16, 27, 0.06)`
  - Dark Featured Card: `0 20px 44px -12px rgba(7, 16, 27, 0.45)`
  - Gold CTA: `0 8px 20px rgba(179, 135, 52, 0.28)`
