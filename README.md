# Ejemplo de ejecución de múltiples réplicas

## Pasos para ejecutar

1. Clonar el repositorio:
   ```sh
   git clone git@github.com:riosventosalucas/stack-docker-ha.git
   cd stack-docker-ha
   ```

2. Inicializar Docker Swarm:
   ```sh
   docker swarm init
   ```

3. Crear la red overlay para Traefik:
   ```sh
   docker network create --driver=overlay traefik-public
   ```

4. Desplegar el stack:
   ```sh
   docker stack deploy -c docker-compose.yml stack
   
