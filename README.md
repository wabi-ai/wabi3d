# WABI 3D — Nettside

## Filstruktur
```
wabi3d/
├── index.html              ← Selve nettsiden (åpne i nettleser)
├── last-ned-bilder.sh      ← Skript som henter bildene fra af3d
├── README.md               ← Denne filen
└── images/                 ← Bildene (opprettes når du kjører skriptet)
```

## Slik kommer du i gang

### Steg 1: Last ned bildene (kun én gang)

**Mac / Linux:**
```bash
cd wabi3d
bash last-ned-bilder.sh
```

**Windows:**
- Åpne Git Bash eller WSL
- Naviger til `wabi3d`-mappen
- Kjør `bash last-ned-bilder.sh`

Skriptet henter alle bildene fra af3d sitt CDN og lagrer dem i `images/`-mappen. Tar ca. 10 sekunder.

### Steg 2: Åpne siden
Dobbeltklikk `index.html` — den åpnes i nettleseren.

### Steg 3: Deploy (når du er klar)
- **Vercel**: Dra hele `wabi3d`-mappen inn på vercel.com → får URL gratis
- **Netlify**: Samme — dra mappen inn på netlify.com
- **Egen server**: Last opp hele mappen til der `wabi3.no` peker

## Hva som mangler / plassholdere
Søk etter `[...]` i `index.html` for å finne ting som skal byttes ut:
- Team-navn, biografier, e-post, telefon
- Hovedkontakt-info (e-post, tlf, adresse, org.nr.)

## Bytte ut bilder
Legg dine egne bilder i `images/`-mappen med samme filnavn (eks1.jpg, int6.jpg osv.) og de overskriver automatisk.

## Domene
Sett `wabi3.no` til å peke på Vercel/Netlify når du er klar.
