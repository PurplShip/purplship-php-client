# PickupRequest

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**pickup_date** | **string** | The expected pickup date  Date Format: YYYY-MM-DD |
**address** | [**\Purplship\Model\AddressData**](AddressData.md) |  |
**parcels** | [**\Purplship\Model\ParcelData[]**](ParcelData.md) | The shipment parcels to pickup. |
**ready_time** | **string** | The ready time for pickup. |
**closing_time** | **string** | The closing or late time of the pickup |
**instruction** | **string** | The pickup instruction.  eg: Handle with care. | [optional]
**package_location** | **string** | The package(s) location.  eg: Behind the entrance door. | [optional]
**options** | **object** | Advanced carrier specific pickup options | [optional]

[[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

