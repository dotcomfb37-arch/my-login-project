FROM php:7.4-apache
COPY . /var/www/html/
# ফোল্ডারের অনুমতি সেট করা
RUN chown -R www-data:www-data /var/www/html/
EXPOSE 80
