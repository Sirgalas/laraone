#!/bin/bash

psql -v ON_ERROR_STOP=1 --username "$POSTGRES_USER" --dbname "$POSTGRES_DB" <<-EOSQL
  CREATE ROLE  laravel LOGIN PASSWORD 'password';
  GRANT ALL PRIVILEGES ON DATABASE laravel TO laravel;
EOSQL
