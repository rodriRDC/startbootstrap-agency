CREATE TABLE TIPO_MUEBLE (
    id INT NOT NULL AUTO_INCREMENT,
	descripcion VARCHAR(32) NOT NULL,
	detalle VARCHAR(300),
    PRIMARY KEY (id)
);

CREATE TABLE AMOBLAMIENTO (
	id INT NOT NULL AUTO_INCREMENT,
	descripcion VARCHAR(300) NOT NULL,
	cliente VARCHAR(32) NOT NULL,
	fecha_presupuesto DATE,
	fecha_aceptacion DATE,
	fecha_inicio DATE,
	fecha_entrega DATE,
	PRIMARY KEY (id)
);

CREATE TABLE MUEBLE_AMOBLAMIENTO (
	id INT NOT NULL AUTO_INCREMENT,
	tipo_mueble INT NOT NULL,
	amoblamiento INT NOT NULL,
	comentarios VARCHAR(200),
	altura DECIMAL(4,2),
	ancho DECIMAL(4,2),
	profundidad DECIMAL(4,2),
	PRIMARY KEY (id),
	FOREIGN KEY (tipo_mueble)
		REFERENCES TIPO_MUEBLE(id)
		ON DELETE CASCADE,
	FOREIGN KEY (amoblamiento)
		REFERENCES AMOBLAMIENTO(id)
		ON DELETE CASCADE
);

CREATE TABLE CORTE_AMOBLAMIENTO (
	id INT NOT NULL AUTO_INCREMENT,
	amoblamiento INT NOT NULL,
	mueble INT NOT NULL,
	ancho DECIMAL(4,2),
	largo DECIMAL(4,2),
	espesor DECIMAL(2,2),
	reversible BOOLEAN,
	PRIMARY KEY (id),
	FOREIGN KEY (mueble)
		REFERENCES MUEBLE_AMOBLAMIENTO(id)
		ON DELETE CASCADE,
	FOREIGN KEY (amoblamiento)
		REFERENCES AMOBLAMIENTO(id)
		ON DELETE CASCADE
);

ALTER TABLE TIPO_MUEBLE AUTO_INCREMENT = 1;
ALTER TABLE AMOBLAMIENTO AUTO_INCREMENT = 1;
ALTER TABLE MUEBLE_AMOBLAMIENTO AUTO_INCREMENT = 1;
ALTER TABLE CORTE_AMOBLAMIENTO AUTO_INCREMENT = 1;