# Install
**Add to composer.json**
```
    "repositories": [
        {
            "type": "vcs",
            "url":  "https://github.com/bezdelnique/yii2-filter"
        }
    ],
```

**Run**
```
composer require bezdelnique/yii2-filter
```


# Force project update
```
rm -Rf vendor/bezdelnique/yii2-filter
composer install
```

# Move tag
git tag
git tag -f v1.0.5
git push origin --tags -f



# Run test
```
./vendor/bin/codecept run
```



