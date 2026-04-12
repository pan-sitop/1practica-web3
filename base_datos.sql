-- Tabla: equipos_laboratorio
CREATE TABLE IF NOT EXISTS equipos_laboratorio (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_serie VARCHAR(50) UNIQUE NOT NULL,
    nombre_equipo VARCHAR(100) NOT NULL,
    tipo ENUM('Computadora', 'Proyector', 'Servidor', 'Redes') NOT NULL,
    fecha_adquisicion DATE NOT NULL,
    estado_operativo TINYINT(1) NOT NULL
);

-- Tabla: eventos_academicos
CREATE TABLE IF NOT EXISTS eventos_academicos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo_evento VARCHAR(150) NOT NULL,
    descripcion TEXT NOT NULL,
    fecha_evento DATETIME NOT NULL,
    modalidad ENUM('Presencial', 'Virtual', 'Hibrido') NOT NULL,
    cupo_maximo INT NOT NULL
);