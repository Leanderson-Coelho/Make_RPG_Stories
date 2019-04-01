SELECT m2.nome,ST_AsEWKT(m2.geom),ST_AsEWKT(m1.geom) 
FROM municipio m1, municipio m2
WHERE m1.nome ilike 'araguari' AND ST_Touches(m1.geom,m2.geom)
LIMIT 4