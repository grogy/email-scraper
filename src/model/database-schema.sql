CREATE TABLE "emails" (
  "address" text NOT NULL
);

CREATE UNIQUE INDEX "emails_address" ON "emails" ("address");


CREATE TABLE "pages" (
  "url" text NOT NULL,
  "last_scan" text NOT NULL
);

CREATE UNIQUE INDEX "pages_url" ON "pages" ("url");
