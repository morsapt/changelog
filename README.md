# Changelog
A simple CRUD to maintain changelog markdown entries on database, and output it
as HTML code.

### Disclaimer
This was the first package I made for Laravel so there might 
be some things missing or not complete. For that forgive me. 
Feel free to contribute, if you like. I made this because I needed 
to maintain the users informed about new version details. It was only intended for
internal usage. 

## Install

1. Install the package using composer.

```
composer require morsapt/changelog
```

2. Run the migration
```
php artisan migrate
```
this will create the changelog table with a `mpt_` prefix - `mpt_changelogs`

## Endpoints

- `GET /changelogs` - return all changelog entries
- `GET /changelogs/{changelog_id}` - return specific changelog entry based on its PK (id) 
- `POST /changelogs` - craete a changelog entry
- `PUT /changelogs/{changelog_id}` - update a changelog entry
- `DELETE /changelogs/{changelog_id}` - delete a changelog entry

### Sorting and Limiting

By default, `GET /changelogs` endpoint uses paginate and will paginate accordingly 
with `perPage` and `orderBy` parameters.
- `perPage` - with set the number of items per page that paginate with return:
    - max number of items is set **500**
    - it will only accept integer values; in case of an invalid value it will be set
    to 10 itens only.
- `orderBy` - array of parameters
    - order of parameters will change the sorting order for the query
    - values allowed: `ASC` and `DESC`
- `page` - page number (from Laravel pagination) 
    
#### Example of GET
```
https://my.tld/api/changelogs?perPage=50orderBy[changelog]=ASC&orderBy[id]=DESC
``` 
This will get you 50 itens per page, sorting by `changelog` column ASCending and `id` column DESCending. 
  
