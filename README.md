# Medniima

## Local Development

Requirements: Docker with the Compose plugin.

```sh
cp .env.example .env
docker compose up --build -d
```

Open http://localhost:8000. Compose builds PHP with `mysqli`, starts MariaDB, and imports `mednima site script/medniima_school.sql` when the database volume is first created. Database data persists in the `medniima_db` volume.

The credentials in `.env.example` are for local development only. Change them in `.env` before exposing this setup beyond your machine. Stop the services with `docker compose down`; this keeps the database volume.