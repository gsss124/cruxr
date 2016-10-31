import os
import re

import psycopg2 #import postgresql library

conn = psycopg2.connect("dbname=<<enter postgresql database name>> host=localhost user=<<enter postgresql username>> password=<<enter postgresql password>>")
cur = conn.cursor()

cur.execute("CREATE TABLE test (id serial PRIMARY KEY, dwfilename varchar, ispdf boolean, isppt boolean, completetext varchar);")

conn.commit()