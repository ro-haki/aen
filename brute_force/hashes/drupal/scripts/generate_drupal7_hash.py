import drupal_hash_utility


drash = drupal_hash_utility.DrupalHashUtility()

# Read the Help Docs
print(help(drash))


# Generate Drupal7 Hash
password = 'rohaki'
encoded = drash.encode(password)

# Verify Password Against Hash
drash.verify(password, encoded)

# Get Hash Summary
drash.summary(encoded)
