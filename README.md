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
   ```

5. Ver estado de los servicios:
   ```sh
   docker service ls
   ID             NAME                  MODE         REPLICAS   IMAGE           PORTS
    m0ocwwbjty1e   stack_mysql           replicated   1/1        mysql:8.0
    vjiocgi3m1m8   stack_nginx           replicated   3/3        nginx:latest
    uunjny0cusoz   stack_php             replicated   5/5        app:latest
    3weqcandktrx   stack_reverse-proxy   replicated   1/1        traefik:v2.11   *:80->80/tcp, *:8080->8080/tcp
   ```