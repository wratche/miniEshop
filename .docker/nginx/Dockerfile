FROM nginx:latest

ARG SERVICE_DIR="./nginx"

# nginx config
COPY ${SERVICE_DIR}/nginx.conf /etc/nginx/

# nginx app config
COPY ${SERVICE_DIR}/sites-available/* /etc/nginx/sites-available/


# workdir
WORKDIR /etc/nginx/

CMD ["nginx"]

EXPOSE 80 443