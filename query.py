import psycopg2

conn = psycopg2.connect("dbname=<<enter postgresql database name>> host=localhost user=<<enter postgresql username>> password=<<enter postgresql password>>")
cur = conn.cursor()

humaninput = raw_input("\nEnter string query:")
humaninput = str(humaninput)

try:
   cur.execute("SELECT dwfilename FROM test WHERE to_tsvector(completetext||' '||allocrtext) @@ to_tsquery(%(tag)s)", {'tag': humaninput})
   print "\nYour string appears in the following file(s):\n"
   for record in cur:
       record = str(record)
       record = record.replace("(", "")
       record = record.replace(")", "")
       record = record.replace(",", "")
       record = record.replace("'", "")
       print record

except:
   print "Something is not right..."
