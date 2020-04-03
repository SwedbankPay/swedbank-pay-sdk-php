FROM prooph/composer:7.3 as build

# docker build --tag swedbankpay/sdk-consumer:0.0.1 . --file tests/sdk-consumer/Dockerfile
# docker run --rm -it swedbankpay/sdk-consumer:0.0.1

WORKDIR /app
VOLUME /app
VOLUME /sdk

# COPY ./tests/sdk-consumer/composer.json /app/
# COPY . /sdk/

# RUN composer install && composer dump-autoload --optimize
# RUN find -L /app/

ENTRYPOINT composer install && \
           composer dump-autoload --optimize && \
           php app.php

# ENTRYPOINT [ "compposer", "install", "php", "app.php" ]
