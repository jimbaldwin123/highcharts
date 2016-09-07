load data local infile 'bills.csv' into table bills fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'
(year,ones,twos,fives,tens,twenties,fifties,hundreds)

