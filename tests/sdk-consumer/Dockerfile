FROM prooph/composer:7.3 as build

# docker build --tag swedbankpay/sdk-consumer:0.0.1 . --file tests/sdk-consumer/Dockerfile
# docker run --rm --volume $(pwd)/tests/sdk-consumer:/app --volume $(pwd):/sdk -it swedbankpay/sdk-consumer:0.0.1

WORKDIR /app
VOLUME /app
VOLUME /sdk

ENTRYPOINT composer install && \
           php app.php
