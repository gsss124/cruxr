Generic Searchable Datawarehouse - Processing PDFs, PPTs, etc

Language - Python

Database - PostgreSQL

Warehouse File Types - PDF, PPTX (for now)

--USAGE--
Install PostgreSQL
Install pgAdmin III
Install Python 2.7
Install PDF Miner on your Python installation, follow this guide -> http://www.unixuser.org/~euske/python/pdfminer/#install
Install python-pptx on your Python installation, follow this guide -> https://python-pptx.readthedocs.io/en/latest/user/install.html#install
Install psycopg2 on your Python installation, follow this guide -> http://initd.org/psycopg/docs/install.html
Run initiate-table.py from command prompt using "python initiate-table.py" command
Clone this repository and replace all the files in the DW folder with your own PDF and PPTX files
That's it, run the query.py file using "python query.py" command from command prompt

The results will show the file(s) having your string

P.S. Python is finicky about indentation sometimes, so be careful about it. This is tested on a Windows machine. Use pgAdmin III to check for table creation and table load