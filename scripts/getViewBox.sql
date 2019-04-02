CREATE OR REPLACE FUNCTION getViewBox() RETURNS TEXT AS $$
        DECLARE     
              viewBox TEXT;  
           BEGIN
              SELECT INTO viewBox CAST(ST_xmin(ST_Envelope(ST_Union(geom))) as varchar) || ' ' || 
                  CAST(ST_ymax(ST_Envelope(ST_Union(geom))) * -1 as varchar) || ' ' ||
                  CAST(ST_xmax(ST_Envelope(ST_Union(geom))) - ST_xmin(ST_Envelope(ST_Union(geom))) as varchar) || ' ' ||
                  CAST(ST_ymax(ST_Envelope(ST_Union(geom))) - ST_ymin(ST_Envelope(ST_Union(geom))) as varchar)
                  FROM regiao;
                return viewBox;
END;  
 $$language plpgsql;