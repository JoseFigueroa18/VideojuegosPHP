#INSERT
INSERT INTO usuarios VALUES (null, 'José','Figueroa','Jack@gmail.com','1234','2023-04-08');
INSERT INTO usuarios VALUES (null, 'Henry','Lazaro','Hen@gmail.com','4321','2023-04-08');
INSERT INTO usuarios VALUES (null, 'SChema','Almendarez','Almen@gmail.com','2134','2023-04-08');
INSERT INTO usuarios VALUES (null, 'Migui','Solorzano','Migui@gmail.com','1243','2023-04-08');

#INSERTS PARA CATEGORIAS
INSERT INTO categorias VALUES (null, 'ACCION');
INSERT INTO categorias VALUES (null, 'ROL');
INSERT INTO categorias VALUES (null, 'DEPORTES');
INSERT INTO categorias VALUES (null, 'AVENTURA');

#INSERTS PARA ENTRADAS
INSERT INTO entradas VALUES (null, 1, 1, 'CONTRA', 'Juego de acción', CURDATE());
INSERT INTO entradas VALUES (null, 3, 3, 'PES', 'Juego de deportes', CURDATE());
INSERT INTO entradas VALUES (null, 1, 2, 'Persona 4', 'Juego de rol', (CURDATE()-2));

SELECT e.*, c.nombre FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id ORDER BY e.id DESC LIMIT 5;

 TRUNCATE TABLE categorias;

 

DESC entradas;

SELECT * FROM entradas;


