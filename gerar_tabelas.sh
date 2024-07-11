#!/bin/bash

# Lista todas as tabelas do banco de dados
tables=$(php artisan db:tables)

# Loop pelas tabelas
for table in $tables; do
    # Gerar migration
    php artisan make:migration create_${table}_table --create=$table
    
    # Gerar model
    php artisan krlove:generate:model $(echo $table | sed -r 's/(^|_)([a-z])/\U\2/g') --table=$table
    
    # Gerar seed
    php artisan iseed $table
done
