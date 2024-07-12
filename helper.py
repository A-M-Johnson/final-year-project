import os
import sys

def change_file_extensions(folder_path, old_extension, new_extension):
    # Ensure the old extension starts with a dot
    if not old_extension.startswith('.'):
        old_extension = '.' + old_extension

    # Ensure the new extension starts with a dot
    if not new_extension.startswith('.'):
        new_extension = '.' + new_extension

    # Iterate over all files in the given folder
    for filename in os.listdir(folder_path):
        # Check if the file ends with the old extension
        if filename.endswith(old_extension):
            # Get the file path without the extension
            base = os.path.splitext(filename)[0]
            # Form the new file name with the new extension
            new_name = base + new_extension
            # Construct full file paths
            old_file = os.path.join(folder_path, filename)
            new_file = os.path.join(folder_path, new_name)
            # Rename the file
            os.rename(old_file, new_file)
            # print(f'Renamed: {old_file} -> {new_file}')

if __name__ == "__main__":
    if len(sys.argv) != 4:
        print("Usage: python change_extensions.py <folder_path> <old_extension> <new_extension>")
        sys.exit(1)

    folder_path = sys.argv[1]
    old_extension = sys.argv[2]
    new_extension = sys.argv[3]
    change_file_extensions(folder_path, old_extension, new_extension)
