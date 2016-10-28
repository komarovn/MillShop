  CREATE TABLE "SYSTEM"."ITEMS" 
   (	"ID" NUMBER NOT NULL ENABLE, 
	"NAME" VARCHAR2(20 BYTE) NOT NULL ENABLE, 
	"PRICE" NUMBER NOT NULL ENABLE, 
	"SIZE" NUMBER NOT NULL ENABLE, 
	"COLOR" NUMBER NOT NULL ENABLE, 
	"IMAGE" BLOB, 
	"DESCRIPTION" VARCHAR2(20 BYTE), 
	 CONSTRAINT "ITEMS_PK" PRIMARY KEY ("ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM"  ENABLE, 
	 CONSTRAINT "ITEMS_SIZES_FK1" FOREIGN KEY ("SIZE")
	  REFERENCES "SYSTEM"."SIZES" ("ID") ON DELETE SET NULL ENABLE, 
	 CONSTRAINT "ITEMS_COLORS_FK1" FOREIGN KEY ("COLOR")
	  REFERENCES "SYSTEM"."COLORS" ("ID") ON DELETE SET NULL ENABLE
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" 
 LOB ("IMAGE") STORE AS BASICFILE (
  TABLESPACE "SYSTEM" ENABLE STORAGE IN ROW CHUNK 8192 RETENTION 
  NOCACHE LOGGING 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)) ;