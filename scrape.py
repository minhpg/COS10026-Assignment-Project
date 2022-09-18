import requests
import os

url = "https://product.prod.pizzahutaustralia.com.au/api/v1/Product/products?primaryCategory=pizza&secondaryCategory=&storeCode=0&fulfilmentDateTime=2022-09-18T08:08&fulfilmentType=Delivery&includeIngredientDetails=true"
response = requests.get(url)

data = response.json()
products = data['products']
products_array = []
for product in products:
    name = product['name']
    description = product['description']
    image_url = product['imageUrl']
    card_url = f'{image_url}/m/180x117/filters:format(webp):quality(90):focal(80x200:420x300)'
    detail_url = f'{image_url}/m/300x800/smart/filters:format(webp):quality(90)'
    slug = product['slug']
    taxonomy = product['taxonomy']
    folder = os.path.join('images',slug)
    os.makedirs(folder, exist_ok=True)
    card_path = os.path.join('images',slug,'card.webp')
    detail_path = os.path.join('images',slug,'detail.webp')
    response = requests.get(card_url)
    open(card_path, 'wb').write(response.content)
    response = requests.get(detail_url)
    open(detail_path, 'wb').write(response.content)
    php_array = f'''
        [
        "name" => "{name}",
        "description" => "{description}",
        "image_card" => "/{card_path}",
        "image_detail" => "/{detail_path}",
        "slug" => "{slug}",
        "taxonomy" => "{taxonomy}"
    ]
    '''
    print(php_array)
    products_array.append(php_array)
open('php_data.txt','w+').write("[{}]".format(','.join(products_array)))





