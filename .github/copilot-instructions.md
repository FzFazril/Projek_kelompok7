# Project Guidance

## Application Structure
- This is a server-rendered PHP and MySQL library-management application intended to run locally with Laragon.
- `config/koneksi.php` creates the shared MySQL connection (`$koneksi`). Include it using a path relative to the current PHP file.
- `halaman_Utama/` contains borrower-facing pages; `halaman_dasboard/` contains the dashboard and CRUD pages for books, loans, and staff. Preserve the existing `dasboard` spelling in paths unless a task explicitly includes a coordinated rename.
- `form/` contains login and borrowing forms, `proses/` contains borrowing/return handlers, and `asett/` contains stylesheets and uploaded book covers.
- The UI text is primarily Indonesian. Keep new labels, validation messages, and confirmation text consistent with that language.

## Implementation Conventions
- Follow the existing plain PHP, HTML, and CSS structure. Avoid introducing frameworks, dependencies, or build tooling without a clear need.
- Reuse the existing shared connection and stylesheet files. Keep relative asset and navigation paths correct for each page's directory.
- Use prepared statements for SQL that includes request or form values. Validate and normalize input on the server; do not trust client-side validation alone.
- Escape values when rendering HTML (typically with `htmlspecialchars`) and URL-encode values placed in query strings.
- Use POST for state-changing actions, verify the target record and authorization where applicable, and redirect after successful submissions.
- Preserve existing database and public field names unless a change explicitly requires a coordinated schema migration. No schema or migration files are currently present in the repository.
- Keep changes focused and match the existing CSS/page conventions. Do not rename `asett/`, `dasboard.php`, or other established paths casually; they are referenced by relative URLs.

## Validation
- There is no project test suite or dependency/build manifest in the repository at present.
- For PHP changes, run `php -l path/to/changed-file.php` for each changed PHP file when the PHP CLI is available.
- For changes involving database behavior or navigation, verify the affected flow through the local Laragon Apache/MySQL application with representative valid and invalid inputs.
- Do not claim database-backed behavior is verified unless it was exercised against the local database.