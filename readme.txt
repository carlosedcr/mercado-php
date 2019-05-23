dbname= shop

user= user

password= admin

port= 5432

comando usado para fazer o backup da base > pg_dump --username user --format tar --file shop.backup shop

comando para restaurar > pg_restore --username=user --dbname=shop shop.backup