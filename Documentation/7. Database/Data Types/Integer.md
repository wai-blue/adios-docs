# Integer

TODO: Toto je zatial priklad, ako dokumentovat datove typy. Treba este povylepsovat.
TODO: prelinkovat s https://github.com/wai-blue/ADIOS/blob/main/src/Core/DB/DataTypes/DataTypeInt.php

NOTE: pat druhov parametrov:
  * pouzivane pri vytvarani SQL stlpca
  * pouzivane pri insert/update operaciach
  * pouzivane pri generovani inputu
  * pouzivane pri zobrazovani vo Form
  * pouzivane pri zobrazovani v Table

| Parameter Name | Used in | Default value | Description |
| --------------- | ---------------- | ----------------- | -------------------------------------------------------------------------------|
| sql_definitions | create SQL table | | Additional SQL definitions to be used when creating the column |
| dumping_data | table, form | false | |
| null_value | table, form | false | Sets the display value of the column to NULL |
| supported_extensions | insert + update | defined in config | Defines the supported extensions by this data type |
| escape_string | | defined in config | Defines the escape string |
