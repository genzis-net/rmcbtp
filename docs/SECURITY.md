# Security & Privacy Notes — RMC BTP

Operational checklist for production and a hard stop on multi-tenant work until isolation exists.

## Production checklist

Before going live, confirm:

| Setting | Required value |
|---|---|
| `APP_ENV` | `production` |
| `APP_DEBUG` | `false` |
| `APP_URL` | `https://…` (HTTPS) |
| `SESSION_SECURE_COOKIE` | `true` |
| `LOG_LEVEL` | `warning` or `error` |
| `ADMIN_EMAIL` / `ADMIN_PASSWORD` | Set; password ≥ 12 characters (required for seeders) |
| `CONTACT_EMAIL_RETENTION_DAYS` | e.g. `365` (used by `contact_emails:prune`) |

Also ensure:

- TLS terminates correctly at the reverse proxy / host.
- Cron runs `php artisan schedule:run` so contact inquiries are pruned daily.
- Existing admin accounts have `email_verified_at` set (admin routes require `verified`).
- Privacy policy at `/{lang}/privacy` has been reviewed by counsel for Cameroon / target markets.

## Contact inquiry PII

- Public form posts to `/store-contact` (throttled).
- Records live in `contact_emails` and are emailed to `config('contact.email')`.
- Admins manage them at `/{lang}/admin/contact-emails`.
- Prune: `php artisan contact_emails:prune` (scheduled daily).

## Authentication notes

- Admin area middleware: `auth` + `verified` + `admin` (`is_admin`).
- `is_admin` is **not** mass-assignable; use `forceFill` only in trusted seeders/ops scripts.
- MFA is **not** implemented yet. Recommended next: TOTP for all admin accounts (e.g. Fortify / dedicated 2FA package).

## Multi-tenant guardrail (do not skip)

**Do not introduce multi-tenant features** (organizations, per-customer invoices, shared messaging, AI chats, etc.) until all of the following exist:

1. A `tenants` (or `organizations`) table and `tenant_id` on every customer-owned model.
2. Request-time tenant resolution (middleware / session / subdomain) that cannot be spoofed by clients.
3. Eloquent **global scopes** (or equivalent) that apply `tenant_id` to every query by default.
4. Policies that deny cross-tenant reads/writes (object-level checks, not only role checks).
5. Storage path isolation (or signed URLs) per tenant for uploaded files.
6. Queue/job context that carries `tenant_id` into background work.
7. Automated **cross-tenant IDOR tests** that fail CI if any leak is introduced.

Until that foundation ships, treat the app as a **single-tenant** CMS for one company (RMC BTP). Product `catalog` filters (`quincaillerie` / `sims_decor`) are **not** a security boundary.

## Related routes

- Privacy: `/{language}/privacy`
- Contact admin: `/{language}/admin/contact-emails`
