import os
import re

import psycopg2

conn = psycopg2.connect("dbname=pythontest host=localhost user=<enter DB username> password=<enter DB password>")
cur = conn.cursor()

cur.execute("CREATE TABLE test (id serial PRIMARY KEY, dwfilename varchar, ispdf boolean, isppt boolean, completetext varchar, allocrtext varchar);")

conn.commit()
