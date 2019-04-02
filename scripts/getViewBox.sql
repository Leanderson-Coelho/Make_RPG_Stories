CREATE OR REPLACE FUNCTION getViewBox(TEXT, TEXT, INTEGER, INTEGER) RETURNS TEXT AS $$  
	DECLARE 
             nome1 ALIAS FOR $1;
             nome2 ALIAS FOR $2;
             estado1 ALIAS FOR $3;
             estado2 ALIAS FOR $4;
	     viewBox TEXT;
 	     BEGIN
		  SELECT INTO viewBox CAST(ST_xmin(ST_Envelope(ST_Union(m1.geom, m2.geom))) as varchar) || ' ' || 
                  CAST(ST_ymax(ST_Envelope(ST_Union(m1.geom, m2.geom))) * -1 as varchar) || ' ' ||
                  CAST(ST_xmax(ST_Envelope(ST_Union(m1.geom, m2.geom))) - ST_xmin(ST_Envelope(ST_Union(m1.geom, m2.geom))) as varchar) || ' ' ||
                  CAST(ST_ymax(ST_Envelope(ST_Union(m1.geom, m2.geom))) - ST_ymin(ST_Envelope(ST_Union(m1.geom, m2.geom))) as varchar)
                  FROM city m1, city m2
                  WHERE m1.nome ilike nome1 AND m2.nome ilike nome2 AND m1.estado_id = estado1 AND m2.estado_id = estado2;
	          return viewBox;
END;	
 $$language plpgsql;